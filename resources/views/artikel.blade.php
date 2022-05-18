@extends('layouts.app')

@section('content')

<div class="container-me">
	<div class="md-t-me">
		<h3 style="font-size: 30px">ARTIKEL</h3>
		<div class="md2-me">
		{!! Form::open(['method'=>'GET','url'=>'/search-list-artikel','role'=>'search'])  !!}
			<div class=" col-md-9 input-group mb-1 px-0" style="position: relative; float: left;">
	       	 <input name="search" type="text" class="form-control" placeholder="Masukan nama artikel" aria-label="Masukan nama artikel" aria-describedby="basic-addon2">
	    	</div>
	    	<div class="input-group-append" style="position: relative; float: left; left: 15px;">
				<button class="button button-white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	    	</div>
		{!! Form::close() !!}
		</div>
	</div>

	@foreach($artikel as $i=>$artikels)
	<div class="md-me">
		<div class="img-me">
			<img src="{{URL::asset('images/artikel/thumbs/'.$artikels->img)}}">
		</div>
		<border>
	    <div class="row">
	        <div class="col-md-8">	
				<div class="text-me">
					<h4>{{ $artikels->judul }}</h4>
					<p class="date-me"> {{ $artikels->created_at }} | <font size="1" face= verdana color=green>{{ $artikels->kategori_artikel }} </font></p>
					{!! str_limit($artikels->isi, 100) !!}
					<br>
					<a href="/artikel/{{ $artikels->id }}" style="color: green">
						<div class="life-more left-text">Selengkapnya</div>
					</a>
				</div>
			<hr size=1 width= 95% align=right color=#A9A9A9 style="position: relative;top: 20px; float: left;">
			</div>
		</div>
		</border>
	</div>
	@endforeach
			
	<!-- <div class="md2-me">
		<p>RECOMENDED FOR YOU</p>
		<br>
	@foreach ($artikel->slice(0, 3) as $artikels)
		<div class="md2-img-me">
			<div class="row-me">
				<div class="foto" style="margin-bottom: 2%; margin-right: 2%">
					<img src="{{URL::asset('images/artikel/thumbs/'.$artikels->img)}}">	
				</div>
			</div>

			<div>
				<a style="color: green" href="/artikel/{{ $artikels->id }}">{{ str_limit($artikels->judul, 50) }}</a>
			</div>
		</div>
	@endforeach
	</div> -->

	<div align="center" style="background-color: #fff; width: 100%; float: left; padding-bottom: 30px">
	   	{!! $artikel->render() !!}
	</div>
				
</div>
@endsection