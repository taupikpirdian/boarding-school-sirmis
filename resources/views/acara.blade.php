@extends('layouts.app')

@section('content')

<div class="container-me">
	<div class="md-t-me">
		<h3 style="font-size: 30px">ACARA</h3>
		<div class="md2-me">
		{!! Form::open(['method'=>'GET','url'=>'/search-list-acara','role'=>'search'])  !!}
			<div class=" col-md-9 input-group mb-1 px-0" style="position: relative; float: left;">
	       	 <input name="search" type="text" class="form-control" placeholder="Masukan nama acara" aria-label="Masukan nama acara" aria-describedby="basic-addon2">
	    	</div>
	    	<div class="input-group-append" style="position: relative; float: left; left: 15px;">
				<button class="button button-white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	    	</div>
		{!! Form::close() !!}
		</div>
	</div>

	@foreach($acara as $i=>$acaras)
	<div class="md-me">
		<div class="img-me">
			<img src="{{URL::asset('images/acara/thumbs/'.$acaras->img)}}">
		</div>
		<div class="text-me">
			<h4>{{ $acaras->judul }}</h4>
			<h5 style="font-size: 14px;">Tanggal Kegiatan : {{ $acaras->tanggal }} {{ $acaras->bulan }} {{ $acaras->tahun }} | {{ $acaras->kategori_acara }}</h5>
			{!! str_limit($acaras->isi, 100) !!}
			<br>
			<a href="/acara/{{ $acaras->id }}" style="color: green">
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

	<div align="center" style="background-color: #fff; width: 100%; float: left; padding-bottom: 30px">
	   	{!! $acara->render() !!}
	</div>

</div>

@endsection