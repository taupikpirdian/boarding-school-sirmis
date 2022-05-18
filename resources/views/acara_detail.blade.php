@extends('layouts.app')

@section('content')
<div class="box_artikel">
	<div class="box_artikel2">
		<h3>{{{$acaras->judul}}}</h3>
		<ul>
			<li>{{{$acaras->created_at}}}</li>
			<li>|</li>
			<li class="green">{{{$acaras->kategori_acara}}}</li>
		</ul>
		<div style="width: 100%; float: left;">
			<img class="img-detail" src="{{URL::asset('images/acara/'.$acaras->img)}}">
		</div>
		<div style="width: 100%; float: left; text-align: justify;">
			<p id="text-artikel">{!! $acaras->isi !!}</p>
		</div>
			
	</div>
	<div class="box_artikel3">
		<h6>INFORMASI ACARA</h6>
		<div class="sidebar-artikel">
			<table>
			  <tr>
			    <th>Tempat </th>
			    <th>:</th>
			    <th>{{{$acaras->tempat}}}</th>
			  </tr>

			  <tr>
			    <th>Waktu </th>
			    <th>:</th>
			    <th>{{{$acaras->tanggal}}} {{{$acaras->bulan}}} {{{$acaras->tahun}}}, Pukul {{{$acaras->jam}}}</th>
			  </tr>

			  <tr>
			    <th>Biaya </th>
			    <th>:</th>
			    <th>{{{$acaras->biaya}}}</th>
			  </tr>
			</table>
		</div>
	</div>
</div>
@endsection