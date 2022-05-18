@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Kategori Acara
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('kategori_acara/index')}}">List Kategori Acara</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchkategori_acara','role'=>'search'])  !!}
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
				<a href="{{URL::to('kategori_acara/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Kategori Acara</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($kategori_acara as $i=>$kategori_acaras)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $kategori_acaras->kategori_acara }} </td>
				         <td>
							<a href='{{URL::action("admin\KategoriAcaraController@edit",array($kategori_acaras->id))}}'>edit</a>
							<a href='{{URL::action("admin\KategoriAcaraController@show",array($kategori_acaras->id))}}'>show</a>
							<form id="kategori_acara{{$kategori_acaras->id}}" action='{{URL::action("admin\KategoriAcaraController@destroy",array($kategori_acaras->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('kategori_acara{{$kategori_acaras->id}}').submit();">delete</a>
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