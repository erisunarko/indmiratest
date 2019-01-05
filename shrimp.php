<html>
	<head>
		<!-- AngularJS dll -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
		<!-- Bootstrap dll -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Google map API -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA38N74y_xGwSV0bI_36OIXDdH-corZO5A" ></script>
		<style>
			a:hover {
				text-decoration : none;
			}
			.label:empty {
				display : none;
			}
			.textblue {
				color : blue;
			}
			.textblack {
				color : black;
			}
			#price {
				font-size : 20px;
			}
			#bigfont {
				font-size : 20px;
			}
			#gmaps {
				width : 100%;
				height: 80%;
			}
			#floating-panel {
				position: absolute;
				top: 10px;
				left: 25%;
				z-index: 5;
				background-color: #fff;
				padding: 5px;
				border: 1px solid #999;
				text-align: center;
				font-family: 'Roboto','sans-serif';
				line-height: 30px;
				padding-left: 10px;
			}
		</style>
	</head>
	
	<body ng-app="myApp">
		<div id="header">
			<div>
				<h3><center>HARGA UDANG</center></h3>
				<hr />
			</div>
		</div>
		<div ng-view></div>
	</body>
	
	<script>
		var app = angular.module('myApp', ['ngRoute']);
		app.config(function($routeProvider) {
			$routeProvider
			.when("/", {
				templateUrl : "shrimpmain.php",
				controller	: "shrimpmainCtrl"
			})
			.when("/detail/:id/:reg_id", {
				templateUrl : "shrimpdetail.php",
				controller	: "shrimpdetailCtrl"
			})
		});
		
		app.controller("shrimpmainCtrl", function($scope, $http) {
			$http({
				method 	: "GET",
				url 	: "https://app.jala.tech/api/shrimp_prices?search&with=creator,species,region"
			}).then(function mySuccess(response) {
				$scope.shrimpPrices = response.data.data;
				console.log(response.data.data);
			}, function myError(response) {
				$scope.resError = response.statusText;
			});
			
			$http({
				method 	: "GET",
				url 	: "https://app.jala.tech/api/regions/"
			}).then(function mySuccess(response) {
				$scope.regions = response.data.data;
				console.log(response.data.data);
			}, function myError(response) {
				$scope.resError = response.statusText;
			});
			
			$http({
				method 	: "GET",
				url 	: "https://app.jala.tech/api/species/"
			}).then(function mySuccess(response) {
				$scope.species = response.data.data;
				//console.log(response.data.data);
			}, function myError(response) {
				$scope.resError = response.statusText;
			});
						
		});
		
		app.controller("shrimpdetailCtrl", function($scope, $http, $routeParams) {
			$scope.id = $routeParams.id;
			$scope.reg_id = $routeParams.reg_id;
			$http({
				method 	: "GET",
				url 	: "https://app.jala.tech/api/shrimp_prices?search&with=creator,species,region&region_id=" + $routeParams.reg_id
			}).then(function mySuccess(response) {
				for(let i = 0; i <= response.data.data.length - 1; i++) {
					if(response.data.data[i].id == $routeParams.id) {
						console.log(response.data.data[i]);
						$scope.data1 	= response.data.data[i];
						var listPrice 	= {};
						for(let k = 20; k <= 200; k = k + 10) {
							let iteration = "size_" + k;
							if(response.data.data[i][iteration] != null) {								
								listPrice[iteration] = response.data.data[i][iteration];
								//console.log(response.data.data[i][iteration]);
							}
						}
						console.log(listPrice);
						$scope.listPrice = listPrice;
					}
				}
				console.log(response.data.data);
				$scope.data2 = response.data.data;
			}, function myError(response) {
				$scope.resError = response.statusText;
			});
			console.log($routeParams.id);
			console.log($routeParams.reg_id);
		});
		
		app.directive('myMap', function() {
			// directive link function
			var link = function(scope, element, attrs) {
				var map, infoWindow;
				var markers = [];
				
				// map config
				var mapOptions = {
					center: new google.maps.LatLng(2.5489, 118.0149),
					zoom: 5,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					scrollwheel: false
				};
				
				// init the map
				function initMap() {
					map = new google.maps.Map(element[0], mapOptions);
					var geocoder = new google.maps.Geocoder();
					var address = 'semarang';
					geocoder.geocode({'address': address}, function(results, status) {
					  if (status === 'OK') {
						map.setCenter(results[0].geometry.location);
						var marker = new google.maps.Marker({
						  map 		: map,
						  position 	: results[0].geometry.location,
						  title 	: 'Harga :'
						});
					  } else {
						alert('Geocode was not successful for the following reason: ' + status);
					  }
					});
				}
				
				// show the map
				initMap();
				
			};
			
			return {
				template 	: '<div id="gmaps"><h1 id="floating-panel">judul</h1></div>',
				replace 	: true,
				link 		: link
			};
		});		
		
		$(document).ready(function() {
			setTimeout(function() {
				//initMap();
			}, 2000);
		});
		
	</script>
	
</html>