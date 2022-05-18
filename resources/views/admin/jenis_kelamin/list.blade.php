@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Jenis Kelamin
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('jenis_kelamin/index')}}">List Jenis Kelamin</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchjenis_kelamin','role'=>'search'])  !!}
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
				<a href="{{URL::to('jenis_kelamin/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Jenis Kelamin</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($jenis_kelamin as $i=>$jenis_kelamins)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {!! $jenis_kelamins->name !!} </td>
				         <td>
							<a href='{{URL::action("admin\JenisKelaminController@edit",array($jenis_kelamins->id))}}'>edit</a>
							<a href='{{URL::action("admin\JenisKelaminController@show",array($jenis_kelamins->id))}}'>show</a>
							<form id="delete_jenis_kelamin{{$jenis_kelamins->id}}" action='{{URL::action("admin\JenisKelaminController@destroy",array($jenis_kelamins->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('delete_jenis_kelamin{{$jenis_kelamins->id}}').submit();">delete</a>
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