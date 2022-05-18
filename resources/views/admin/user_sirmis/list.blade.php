@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Users
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('user_sirmis/index')}}">List Users</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchuser_sirmis','role'=>'search'])  !!}
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
				<a href="{{URL::to('user_sirmis/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Nama</b></th>
				       	<th><b>Email</b></th>
				       	<th><b>Password</b></th>
				       	<th><b>Photo</b></th>

				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($user_sirmis as $i=>$user_sirmiss)
				     	<tr>
				     	<td>{{$i+1}}</td>
				        <td> {!! $user_sirmiss->name !!} </td>
				        <td> {!! $user_sirmiss->email !!} </td>
				        <td> {!! $user_sirmiss->password !!} </td>
				        <td>
            				<img style="width:30%" src="{{URL::asset('assets/images/'.$user_sirmiss->photo)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\UsersController@edit",array($user_sirmiss->id))}}'>edit</a>
							<a href='{{URL::action("admin\UsersController@show",array($user_sirmiss->id))}}'>show</a>
							<form id="user_sirmis{{$user_sirmiss->id}}" action='{{URL::action("admin\UsersController@destroy",array($user_sirmiss->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('user_sirmis{{$user_sirmiss->id}}').submit();">delete</a>
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