@extends('layouts.app')

@section('content')

<div class="galeri">
	<div class="galeri-title-home">
	<h2>GALERI ALIYAH</h2>
	</div>
@foreach($galeri_pesantren as $i=>$galeri_pesantrens)
	<a class="lightbox" href="#{{{ $galeri_pesantrens->id }}}">
		   <img src="{{URL::asset('images/galeri/pesantren/thumbs/'.$galeri_pesantrens->img)}}"/>
	</a> 
	<div class="lightbox-target" id="{{{ $galeri_pesantrens->id }}}">
		   <img src="{{URL::asset('images/galeri/pesantren/'.$galeri_pesantrens->img)}}"/>
	   <!-- <img src="{{URL::asset('images/galeri/pesantren/'.$galeri_pesantrens->img)}}"/> -->
	   <a class="lightbox-close" href="#"></a>
	</div>
@endforeach
</div>
	<div align="center" style="background-color: #fff;">
	   	{!! $galeri_pesantren->render() !!}
	</div>

@endsection