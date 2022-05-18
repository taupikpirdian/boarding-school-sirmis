@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Sejarah
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('sejarah_sirmis/index')}}">List Sejarah</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchsejarah_sirmis','role'=>'search'])  !!}
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
				<a href="{{URL::to('sejarah_sirmis/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
<!-- 				       	<th><b>id</b></th> -->
				       	<th><b>Sejarah</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($sejarah_sirmis as $i=>$sejarah_sirmiss)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td>
                            <div class="smaller lighter">
                                <span>{!! str_limit($sejarah_sirmiss->sejarah, 100) !!}</span>
                                <a href='{{URL::action("admin\SejarahController@show",array($sejarah_sirmiss->id))}}'> Lihat Selengkapnya</a>
                            </div>
                         </td>
				         <td>
							<a href='{{URL::action("admin\SejarahController@edit",array($sejarah_sirmiss->id))}}'>edit</a>
							<a href='{{URL::action("admin\SejarahController@show",array($sejarah_sirmiss->id))}}'>show</a>
							<form id="sejarah_sirmis{{$sejarah_sirmiss->id}}" action='{{URL::action("admin\SejarahController@destroy",array($sejarah_sirmiss->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('sejarah_sirmis{{$sejarah_sirmiss->id}}').submit();">delete</a>
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