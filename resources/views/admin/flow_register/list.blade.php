@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Alur Pendaftaran
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('flow/index')}}">List Alur Pendaftaran</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
			<div class='pull-right'>
				<a href="{{URL::to('flow/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th style='width:700px'><b>Deskripsi</b></th>
				       	<th><b>Gambar</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($flows as $i=>$flow)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $flow->desc }} </td>
				         <td>
            				<img style="width:100%" src="{{URL::asset('images/flow/'.$flow->img)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\FlowController@edit",array($flow->id))}}'>edit</a>
							<a href='{{URL::action("admin\FlowController@show",array($flow->id))}}'>show</a>
							<form id="flow{{$flow->id}}" action='{{URL::action("admin\FlowController@destroy",array($flow->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('flow{{$flow->id}}').submit();">delete</a>
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