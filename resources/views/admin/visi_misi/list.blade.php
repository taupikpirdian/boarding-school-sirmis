@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Visi dan Misi
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('visi_misi/index')}}">List Visi dan Misi</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchvisi_misi','role'=>'search'])  !!}
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
				<a href="{{URL::to('visi_misi/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Visi</b></th>
				       	<th><b>Misi</b></th>
				       	<th><b>Kategori</b></th>

				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($visi_misi as $i=>$visi_misis)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				     	 <td>
                            <div class="smaller lighter">
                                <span>{!! str_limit($visi_misis->visi, 100) !!}</span>
                                <a href='{{URL::action("admin\VisiMisiController@show",array($visi_misis->id))}}'> Lihat Selengkapnya</a>
                            </div>
                         </td>
				         <td>
                            <div class="smaller lighter">
                                <span>{!! str_limit($visi_misis->misi, 100) !!}</span>
                                <a href='{{URL::action("admin\VisiMisiController@show",array($visi_misis->id))}}'> Lihat Selengkapnya</a>
                            </div>
                         </td>
                         <td> {{ $visi_misis->kategori_visimisi }} </td>
				         <td>
							<a href='{{URL::action("admin\VisiMisiController@edit",array($visi_misis->id))}}'>edit</a>
							<a href='{{URL::action("admin\VisiMisiController@show",array($visi_misis->id))}}'>show</a>
							<form id="visi_misi{{$visi_misis->id}}" action='{{URL::action("admin\VisiMisiController@destroy",array($visi_misis->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('visi_misi{{$visi_misis->id}}').submit();">delete</a>
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