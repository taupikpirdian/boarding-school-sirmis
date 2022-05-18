@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Ukuran Seragam
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('ukuran_seragam/index')}}">List Ukuran Seragam</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchukuran_seragam','role'=>'search'])  !!}
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
				<a href="{{URL::to('ukuran_seragam/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Ukuran Seragam</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($ukuran_seragam as $i=>$ukuran_seragams)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $ukuran_seragams->ukuran_seragam }} </td>
				         <td>
							<a href='{{URL::action("admin\UkuranSeragamController@edit",array($ukuran_seragams->id))}}'>edit</a>
							<a href='{{URL::action("admin\UkuranSeragamController@show",array($ukuran_seragams->id))}}'>show</a>
							<form id="ukuran_seragam{{$ukuran_seragams->id}}" action='{{URL::action("admin\UkuranSeragamController@destroy",array($ukuran_seragams->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('ukuran_seragam{{$ukuran_seragams->id}}').submit();">delete</a>
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