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
		<!-- Google map API 
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA38N74y_xGwSV0bI_36OIXDdH-corZO5A&callback=myMap"></script>
		-->
		<style>
			a:hover {
				text-decoration 	: none;
			}
			.label:empty {
				display 	: none;
			}
			.textblue {
				color 	: blue;
			}
			.textblack {
				color 	: black;
			}
			#map {
				background-color : lightgrey;
			}
			#price {
				font-size 		: 20px;
			}
			#bigfont {
				font-size 		: 20px;
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
				//console.log(response.data.data);
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
						$scope.data1 = response.data.data[i];						
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
	</script>
	
</html>