@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Pendidikan Orang Tua
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('pendidikan_ortu/index')}}">List Pendidikan Orang Tual</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchpendidikan_ortu','role'=>'search'])  !!}
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
				<a href="{{URL::to('pendidikan_ortu/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Pendidikan Orang Tua</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($pendidikan_ortu as $i=>$pendidikan_ortus)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $pendidikan_ortus->pendidikan_ortu }} </td>
				         <td>
							<a href='{{URL::action("admin\PendidikanOrtuController@edit",array($pendidikan_ortus->id))}}'>edit</a>
							<a href='{{URL::action("admin\PendidikanOrtuController@show",array($pendidikan_ortus->id))}}'>show</a>
							<form id="pendidikan_ortu{{$pendidikan_ortus->id}}" action='{{URL::action("admin\PendidikanOrtuController@destroy",array($pendidikan_ortus->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('pendidikan_ortu{{$pendidikan_ortus->id}}').submit();">delete</a>
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