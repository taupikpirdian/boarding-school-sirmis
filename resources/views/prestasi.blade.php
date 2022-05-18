@extends('layouts.app')

@section('content')

<div class="container-me">
	<div class="md-t-me">
		<h3>PRESTASI</h3>
		<div class="md2-me">
		{!! Form::open(['method'=>'GET','url'=>'/search-list-prestasi','role'=>'search'])  !!}
			<div class=" col-md-9 input-group mb-1 px-0" style="position: relative; float: left;">
	       	 <input name="search" type="text" class="form-control" placeholder="Masukan nama siswa/prestasi" aria-label="Masukan nama siswa/prestasi" aria-describedby="basic-addon2">
	    	</div>
	    	<div class="input-group-append" style="position: relative; float: left; left: 15px;">
				<button class="button button-white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	    	</div>
		{!! Form::close() !!}
		</div>
	</div>
	@foreach($prestasi_sirmis as $i=>$prestasi_sirmiss)
	<div class="md-me">
		<div class="img-me">
			<img src="{{URL::asset('images/prestasi/thumbs/'.$prestasi_sirmiss->img)}}">
		</div>
		<div class="text-me">
			<h4>{{ $prestasi_sirmiss->jenis }}</h4>
			<h5 style="font-size: 14px;">Nama Penerima Prestasi : {{ $prestasi_sirmiss->name }}</h5>
			<p>{!! str_limit($prestasi_sirmiss->deskripsi, 100) !!}</p>
			<br>
			<a href="/prestasi/{{$prestasi_sirmiss->id}}">
				<div class="life-more left-text">Selengkapnya</div>
			</a>
		</div>
		<hr size=1 width= 95% align=right color=#A9A9A9 style="position: relative;top: 20px; float: left;">
	</div>
	@endforeach


	<div class="md2-me">
	<!-- <p>RECOMENDED FOR YOU</p>
	<br>
		<div class="md2-img-me">
			<div class="row-me">
				<div class="foto">
					<img src="1.jpg">	
				</div>
			</div>
			<div>
				<a href="#">What is Lorem Ipsum </a>
			</div>
		</div>

		<div class="md2-img-me">
			<div class="row-me">
				<div class="foto">
					<img src="1.jpg">	
				</div>
			</div>
			<div>
				<a href="#">What is Lorem Ipsum </a>
			</div>
		</div> -->
	</div>

	<div align="center" style="background-color: #fff; width: 100%; float: left;">
		{!! $prestasi_sirmis->render() !!}
	</div>

</div>

@endsection