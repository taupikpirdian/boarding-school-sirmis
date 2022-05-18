@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Testimoni
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('testimoni/index')}}">List Testimoni</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchtestimoni','role'=>'search'])  !!}
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
				<a href="{{URL::to('testimoni/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Nama</b></th>
				       	<th><b>Status</b></th>
				       	<th><b>Isi</b></th>
				       	<th style='width:170px'><b>Foto</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($testimonis as $i=>$testimoni)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $testimoni->name }} </td>
				         <td> {{ $testimoni->kategori }} </td>
				         <td>
                            <div class="smaller lighter">
                            <span>{!! str_limit($testimoni->desc, 100) !!}</span>
                            	<a href='{{URL::action("admin\TestimoniController@show",array($testimoni->id))}}'> Lihat Selengkapnya</a>
                            </div>
                          </td>
				          <td>
            				<img style="width:30%" src="{{URL::asset('images/testimoni/thumbs/'.$testimoni->img)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\TestimoniController@edit",array($testimoni->id))}}'>edit</a>
							<a href='{{URL::action("admin\TestimoniController@show",array($testimoni->id))}}'>show</a>
							<form id="testimonis{{$testimoni->id}}" action='{{URL::action("admin\TestimoniController@destroy",array($testimoni->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('testimonis{{$testimoni->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $testimonis->render() !!}
		</div>
	</div>
</section>
@endsection