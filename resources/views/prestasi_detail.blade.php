@extends('layouts.app')

@section('content')
<div class="box_artikel">

	<div class="box_artikel2">
		<h3>{{{$prestasi_sirmis->name}}}</h3>
		<ul>
			<li>{{{$prestasi_sirmis->created_at}}}</li>
			<li>|</li>
			<li>{{{$prestasi_sirmis->jenis}}}</li>
		</ul>
		<div style="width: 50%; float: left;">
			<img class="img-detail" src="{{URL::asset('images/prestasi/'.$prestasi_sirmis->img)}}">
		</div>
		<div style="width: 100%; float: left; text-align: justify;">
			<p id="text-artikel">{!! $prestasi_sirmis->deskripsi !!}</p>
		</div>
			
	</div>
</div>
@endsection