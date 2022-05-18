@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Jadwal Pendaftaran
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('jadwal-pendaftaran/index')}}">List Jadwal Pendaftaran</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
			</div>
				
			<div class='pull-right'>
				<a href="{{URL::to('jadwal-pendaftaran/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Isi</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($schedulles as $i=>$schedulle)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {!! $schedulle->desc !!} </td>
				         <td>
							<a href='{{URL::action("admin\JadwalPendaftaranController@edit",array($schedulle->id))}}'>edit</a>
							<a href='{{URL::action("admin\JadwalPendaftaranController@show",array($schedulle->id))}}'>show</a>
							<form id="schedulle{{$schedulle->id}}" action='{{URL::action("admin\JadwalPendaftaranController@destroy",array($schedulle->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('schedulle{{$schedulle->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
		</div>
	</div>
</section>
@endsection