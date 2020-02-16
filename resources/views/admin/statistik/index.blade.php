@extends('layouts.admin')
@section('content')
<div class="card">
	<div class="card-header"><b>Data Statistik</b></div>

	<div class="card-body">
		<div class="row" >
		<div class="col-lg-3 col-6">
			<div class="small-box bg-danger">
				<div class="inner">
					<h3>{{$buku}}</h3>
					<p>Data Buku</p>
				</div>
				<div class="icon">
					<i class="fas fa-book"></i>
				</div>
				<a href="{{route('admin.buku.index')}}" class="small-box-footer">More Info
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>200</h3>
					<p>Data Pengunjung</p>
				</div>
				<div class="icon">
					<i class="fas fa-users"></i>
				</div>
				<a href="#" class="small-box-footer">More Info
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<div class="small-box bg-danger">
				<div class="inner">
					<h3>{{ $struktur }}</h3>
					<p>Data Anggota</p>
				</div>
				<div class="icon">
					<i class="fas fa-user"></i>
				</div>
				<a href="{{route('admin.struktur.index')}}" class="small-box-footer">More Info
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

	<div class="col-lg-3 col-6">
			<div class="small-box bg-warning">
				<div class="inner">
					<h3>{{ $majalah }}</h3>
					<p>Data Majalah</p>
				</div>
				<div class="icon">
					<i class="fas fa-book-open"></i>
				</div>
				<a href="{{route('admin.majalah.index')}}" class="small-box-footer">More Info
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		</div>

		<div class="col-lg-3 col-6">
			<div class="small-box bg-success">
				<div class="inner">
					<h3>{{ $ebook }}</h3>
					<p>Data Ebook</p>
				</div>
				<div class="icon">
					<i class="fas fa-book"></i>
				</div>
				<a href="{{route('admin.struktur.index')}}" class="small-box-footer">More Info
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		</div>

	<div class="card-header"><b>Statistik Data Buku</b></div>

	<div class="card-body">
		<div class="row" >
		<div class="col-lg-3 col-6">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>200</h3>
					<p>Sastra</p>
				</div>
				<div class="icon">
					<i class="fas fa-book"></i>
				</div>
				<a href="{{route('admin.buku.index')}}" class="small-box-footer">More Info
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<div class="small-box bg-success">
				<div class="inner">
					<h3>200</h3>
					<p>Bahasa</p>
				</div>
				<div class="icon">
					<i class="fas fa-book-open"></i>
				</div>
				<a href="#" class="small-box-footer">More Info
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<div class="small-box bg-warning">
				<div class="inner">
					<h3>200</h3>
					<p>Filsafat</p>
				</div>
				<div class="icon">
					<i class="fas fa-book"></i>
				</div>
				<a href="#" class="small-box-footer">More Info
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-6">
			<div class="small-box bg-danger">
				<div class="inner">
					<h3>200</h3>
					<p>Agama</p>
				</div>
				<div class="icon">
					<i class="fas fa-book-open"></i>
				</div>
				<a href="#" class="small-box-footer">More Info
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header"><b>Grafik</b></div>

	<div class="card-body">
		<div id="Chart">
			
		</div>
	</div>
</div>

@endsection
@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
	Highcharts.chart('Chart', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Total Buku, Majalah, dan Ebook'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Buku', {{ $buku }}],
            ['Majalah', {{ $majalah }}],
            ['Ebook', {{ $ebook }}]
        ]
    }]
});
</script>
@parent
@endsection