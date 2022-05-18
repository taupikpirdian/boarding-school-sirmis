@extends('layouts.app')

@section('content')
<div class="box_artikel">
	<div class="box_artikel2">
		@if(!empty($artikel))
		<h3>{{{$artikel->judul}}}</h3>
		<ul>
			<li>{{{$artikel->created_at}}}</li>
			<li>|</li>
			<li class="green">{{{$artikel->kategori_artikel}}}</li>
		</ul>
		<div class="box_img">
			<img class="img-detail" src="{{URL::asset('images/artikel/'.$artikel->img)}}">
		</div>

		<a href="{{URL::to('/assets/file/artikel/'.$artikel->file)}}"> 
			<button class="btn-1">
				<i class="fa fa-download"></i> Download Materi
			</button>
		</a>

		<div class="bx-txt-artikel">
			<p id="text-artikel">{!! $artikel->isi !!}</p>
		</div>

	</div>
	@endif

	<div class="md2-me" style="margin-top: 5%">
		<p>RECOMENDED FOR YOU</p>
		<br>
		@foreach($artikel_v2 as $i=>$artikels)
		<div class="md2-img-me">
			<div class="row-me">
				<div class="foto" style="margin-bottom: 2%; margin-right: 2%">
					<img src="{{URL::asset('images/artikel/'.$artikels->img)}}">	
				</div>
			</div>

			<div>
				<a href="/artikel/{{ $artikels->id }}">{{ str_limit($artikels->judul, 50) }}</a>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection