<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8">
			<a href="#!/"><button type="button" class="btn btn-success" >BACK</button></a>
			<hr />
			<div class="panel panel-primary">
				<div class="panel-heading"><p>Detail Harga Udang</p></div>
				<div class="panel-body">
					<p><b>Jenis Udang : <span id="bigfont">{{ data1.species.name }}</b></span></p>					
					<p>Lokasi      : {{ data1.region.regency_name }} {{ data1.region.province_name }}</p>
					<p>Harga udang ukuran 50 : <span id="price"><b>Rp. {{ data1.size_50 }}</b></span></p>
					<p>Hubungi Penjual : 081345432123</p>					
				</div>
				<div class="panel-footer"><span class="label label-primary">UBAH</span></div>
			</div>
		</div>
		
		<div class="col-lg-4">
		<h3><center><b>::Rekomendasi::</b><center></h3>
		<hr />
			<div class="panel panel-primary" id="card" ng-repeat="x in data2">
				<div class="panel-heading"><p>{{ x.created_at }} / Dibuat oleh petambak / {{ x.creator.name }}</p></div>
				<div class="panel-body">					
					<p><b>Jenis Udang : <span id="bigfont">{{ x.species.name }}</b></span></p>					
					<p>Lokasi      : {{ x.region.regency_name }} {{ x.region.province_name }}</p>
					<p>Harga udang ukuran 50 : <span id="price"><b>Rp. {{ x.size_50 }}</b></span></p>
					<p>Hubungi Penjual : 081345432123</p>					
				</div>
				<div class="panel-footer">
					<p>
						<span class="label label-warning">SALIN</span> 
						&nbsp;&nbsp;&nbsp;&nbsp; 
						<a href="#!detail/{{ x.id }}/{{ x.region.id }}"><span class="label label-primary">LIHAT SEMUA UKURAN</span></a> 
						&nbsp;&nbsp;&nbsp;&nbsp; 
						<span class="label label-success">BAGIKAN</span> 
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
