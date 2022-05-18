@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Pimpinan
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('pimpinan_lembaga/index')}}">Pimpinan</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchpimpinan_lembaga','role'=>'search'])  !!}
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
				<a href="{{URL::to('pimpinan_lembaga/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Nama</b></th>
				       	<th><b>Jabatan</b></th>
				       	<th><b>Kategori</b></th>
				       	<th><b>Foto</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($pimpinan_lembaga as $i=>$pimpinan_lembagas)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $pimpinan_lembagas->name }} </td>
				         <td> {{ $pimpinan_lembagas->jabatan }} </td>
				         <td> {{ $pimpinan_lembagas->kategori_pimpinan }} </td>
				         <td>
            				<img style="width:30%" src="{{URL::asset('images/pimpinan/'.$pimpinan_lembagas->img)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\PimpinanController@edit",array($pimpinan_lembagas->id))}}'>edit</a>
							<a href='{{URL::action("admin\PimpinanController@show",array($pimpinan_lembagas->id))}}'>show</a>
							<form id="pimpinan_lembaga{{$pimpinan_lembagas->id}}" action='{{URL::action("admin\PimpinanController@destroy",array($pimpinan_lembagas->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('pimpinan_lembaga{{$pimpinan_lembagas->id}}').submit();">delete</a>
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