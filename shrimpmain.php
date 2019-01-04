<div class="container">
	<div class="row">
		<div>
			Filter Lokasi : 
			<select>
				<option value='' disabled selected>Pilih Provinsi</option>
				<option>dummy1</option>
				<option>dummy2</option>
			</select>
			<select>
				<option value='' disabled selected>Pilih Kabupaten</option>
				<option>dummy1</option>
				<option>dummy2</option>
			</select>
			&nbsp;
			|
			&nbsp;
			Urutkan berdasarkan : 
			<select>
				<option>Terbaru</option>
				<option>Terlama</option>
			</select>
			&nbsp;
			|
			&nbsp;
			Urutkan berdasarkan : 
			<select>
				<option>Acak</option>
				<option>Termurah</option>
				<option>Termahal</option>
			</select>
		</div>
	</div>
</div>

<hr />

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8">
		<p>Persebaran Harga Udang</p>
		<hr />
			<div class="panel panel-default" id="map">
				<div class="panel-body">
					
				</div>
			</div>
		</div>

		<div class="col-lg-4">
		<p>List Harga Udang</p>
		<hr />
			<div class="panel panel-primary" id="card" ng-repeat="x in shrimpPrices">
				<div class="panel-heading"><p>{{ x.created_at }} / Dibuat oleh petambak / {{ x.creator.name }}</p></div>
				<div class="panel-body">					
					<p><b>Jenis Udang : <span id="bigfont">{{ x.species.name }}</b></span></p>					
					<p>Lokasi      : {{ x.region.regency_name }} {{ x.region.province_name }}</p>
					<p>Harga udang ukuran 50 : <span id="price"><b>Rp. {{ x.size_50 }}</b></span></p>
					<p>Hubungi Penjual : 081345432123</p>					
				</div>
				<div class="panel-footer"><p><span class="label label-warning">SALIN</span> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#!detail/{{ x.id }}/{{ x.region.id }}"><span class="label label-primary">LIHAT SEMUA UKURAN</span></a> &nbsp;&nbsp;&nbsp;&nbsp; <span class="label label-success">BAGIKAN</span></p></div>
			</div>
		</div>
	</div>
</div>
