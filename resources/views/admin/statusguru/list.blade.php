@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Status Guru
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('status_guru/index')}}">List Status Guru</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchstatus_guru','role'=>'search'])  !!}
					<div class='form-group clearfix'>
						<div class='col-md-10'>
			                <div class="input-group custom-search-form">
			                  <input type="text" class="form-control" name="search" placeholder="Search...">
			                    <span class="input-group-btn">
			                    	<span class="input-group-btn">
				       					<button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
				     				</span>
			                    </span>
			                </div>
			            </div>
			        </div>
          		{!! Form::close() !!}
			</div>
				
			<div class='pull-right'>
				<a href="{{URL::to('status_guru/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Status Guru</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($status_guru as $i=>$status_gurus)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $status_gurus->status_guru }} </td>
				         <td>
							<a href='{{URL::action("admin\StatusGuruController@edit",array($status_gurus->id))}}'>edit</a>
							<a href='{{URL::action("admin\StatusGuruController@show",array($status_gurus->id))}}'>show</a>
							<form id="status_guru{{$status_gurus->id}}" action='{{URL::action("admin\StatusGuruController@destroy",array($status_gurus->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('status_guru{{$status_gurus->id}}').submit();">delete</a>
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