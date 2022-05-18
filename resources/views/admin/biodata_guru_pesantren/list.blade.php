@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Biodata Guru Pesantren
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('biodata_guru_pesantren/index')}}">List Biodata Guru Pesantren</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchbiodata_guru_pesantren','role'=>'search'])  !!}
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
				<a href="{{URL::to('biodata_guru_pesantren/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Nama</b></th>
				       	<th><b>NIP</b></th>
				       	<th><b>Tempat Lahir</b></th>
				       	<th><b>Tanggal Lahir</b></th>
				       	<th><b>Jenis Kelamin</b></th>
				       	<th><b>Status</b></th>
				       	<th><b>Alamat</b></th>
				       	<th><b>Mata Pelajaran</b></th>
				       	<th><b>Kategori</b></th>
				       	<th><b>Awal mengajar</b></th>
				       	<th><b>Foto</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($biodata_guru_pesantren as $i=>$biodata_guru_pesantrens)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $biodata_guru_pesantrens->nama }} </td>
				         <td> {{ $biodata_guru_pesantrens->nip }} </td>
				         <td> {{ $biodata_guru_pesantrens->tempat_lahir }} </td>
				         <td> {{ $biodata_guru_pesantrens->tanggal_lahir }} </td>
				         <td> {{ $biodata_guru_pesantrens->jk }} </td>
				         <td> {{ $biodata_guru_pesantrens->status_guru }} </td>
				         <td> {{ $biodata_guru_pesantrens->alamat }} </td>
				         <td> {{ $biodata_guru_pesantrens->matpel }} </td>
				         <td> {{ $biodata_guru_pesantrens->kategori_guru }} </td>
				         <td> {{ $biodata_guru_pesantrens->awal_masuk }} </td>
				         <td>
            				<img style="width:25%" src="{{URL::asset('images/biodataguru/pesantren/'.$biodata_guru_pesantrens->img)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\BiodataGuruPesantrenController@edit",array($biodata_guru_pesantrens->id))}}'>edit</a>
							<a href='{{URL::action("admin\BiodataGuruPesantrenController@show",array($biodata_guru_pesantrens->id))}}'>show</a>
							<form id="biodata_guru_pesantren{{$biodata_guru_pesantrens->id}}" action='{{URL::action("admin\BiodataGuruPesantrenController@destroy",array($biodata_guru_pesantrens->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('biodata_guru_pesantren{{$biodata_guru_pesantrens->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $biodata_guru_pesantren->render() !!}
		</div>
	</div>
</section>
@endsection