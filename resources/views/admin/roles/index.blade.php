@extends('layouts.admin')

@section('content')

@if ($message = Session::get('flash-store'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('flash-update'))
	<div class="alert alert-info alert-block">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('flash-destroy'))
	<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('flash-approve'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>{{ $message }}</strong>
	</div>
@endif

<section class="content-header">
	<h1>
	  	List Role
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('role/index')}}">List Role</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/search-roles','role'=>'search'])  !!}
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
				<a href="{{URL::to('/roles/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Role</b></th>
				       	<th class='text-center' style='width:130px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($roles as $i=>$role)
				     	<tr>
				     	<td>{{ ($roles->currentpage()-1) * $roles->perpage() + $i + 1 }}</td>
		         		<td> {{ $role->name }} </td>
				        <td>
							<a class="btn btn-warning btn-sm" href='{{URL::action("admin\RoleController@edit",array($role->id))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a>
							<form class="btn btn-danger btn-sm" id="delete_role{{$role->id}}" action='{{URL::action("admin\RoleController@destroy",array($role->id))}}' method="POST">
								<input type="hidden" name="_method" value="delete">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<a href="#" onclick="document.getElementById('delete_role{{$role->id}}').submit();"><i class="fa fa-trash fa-xs" style="color: white"></i></a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $roles->render() !!}
		</div>
	</div>
</section>
@endsection