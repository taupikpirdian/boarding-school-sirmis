@extends('layouts.app')

@section('content')
<div class="strukturs">
 	<div class="struktur">
	 	<h2>STRUKTUR PESANTREN</h2>
	 	@foreach($struktur_sirmis as $i=>$struktur_sirmiss)
	 		<p>{!! $struktur_sirmiss->isi !!}</p>
	 	@endforeach
 	</div>
 </div>
@endsection