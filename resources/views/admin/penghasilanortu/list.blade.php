@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Penghasilan Ortu
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('penghasilan_ortu/index')}}">List Penghasilan Ortu</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchpenghasilan_ortu','role'=>'search'])  !!}
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
				<a href="{{URL::to('penghasilan_ortu/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Penghasilan Ortu</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($penghasilan_ortu as $i=>$penghasilan_ortus)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $penghasilan_ortus->penghasilan_ortu }} </td>
				         <td>
							<a href='{{URL::action("admin\PenghasilanOrtuController@edit",array($penghasilan_ortus->id))}}'>edit</a>
							<a href='{{URL::action("admin\PenghasilanOrtuController@show",array($penghasilan_ortus->id))}}'>show</a>
							<form id="penghasilan_ortu{{$penghasilan_ortus->id}}" action='{{URL::action("admin\PenghasilanOrtuController@destroy",array($penghasilan_ortus->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('penghasilan_ortu{{$penghasilan_ortus->id}}').submit();">delete</a>
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