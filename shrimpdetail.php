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
		<style>
			body {
				background-color : LightGray;
			}
			#header {
				background-color : White;
			}
			.content {
				background-color : White;
			}
			.spacer {
				height : 10px;
				background-color : LightGray;
			}
			.badge {
				background-color : LightGray;
			}
		</style>
	</head>

	<body ng-app="myApp">
		<div class="row spacer"></div>
		<div class="container" id="header">
			<div class="row">
				<div class="col-lg-12"><h3>HARGA UDANG</h3></div>
			</div>
			<div class="row spacer"></div>
			<div class="row">
				<div class="col-lg-4 form-group">
					<label for="filterLokasi1">Filter lokasi :</label>
					<select class="form-control input-sm" id="filterLokasi1">
						<option value="" disabled selected>Pilih Provinsi</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
					<select class="form-control input-sm" id="filterLokasi2">
						<option value="" disabled selected>Pilih Kabupaten</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
				</div>
				<div class="col-lg-4 form-group">
					<label for="filterUpdate">Urutkan berdasarkan :</label>
					<select class="form-control input-sm" id="filterUpdate">
						<option>Terbaru</option>
						<option>Terlama</option>
					</select>
				</div>
				<div class="col-lg-4 form-group">
					<label for="filterHarga">Urutkan harga :</label>
					<select class="form-control input-sm" id="filterHarga">
						<option>Acak</option>
						<option>Termahal</option>
						<option>Termurah</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row spacer"></div>
		<div class="container">
			<div class="row content">
				<div class="col-lg-6">
					<p>Persebaran Harga Udang</p>
				</div>
				<div class="col-lg-6">
					<p>List Harga Udang</p>
					<div class="badge">
						
					</div>
				</div>
			</div>
		</div>
		
	<script>

	</script>

	</body>
</html>