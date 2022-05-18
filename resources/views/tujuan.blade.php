@extends('layouts.app')

@section('content')
<div class="tujuan">
 	<div class= "tujuan1">
	 	<h2>TUJUAN</h2>
	@foreach($tujuan_sirmis as $i=>$tujuan_sirmiss)
	 	<p>{!! $tujuan_sirmiss->isi !!}</p>
	@endforeach
 	
 	</div>
 </div>
@endsection