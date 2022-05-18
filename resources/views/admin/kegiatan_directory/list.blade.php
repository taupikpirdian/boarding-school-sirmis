@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Kegiatan
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('kegiatan/index')}}">List Kegiatan</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
			</div>
				
			<div class='pull-right'>
				<a href="{{URL::to('kegiatan/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Judul</b></th>
				       	<th><b>Isi</b></th>
				       	<th><b>Kategori</b></th>
				       	<th style="width:350px"><b>Image</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($kegiatans as $i=>$kegiatan)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $kegiatan->title }} </td>
				         <td> {!! $kegiatan->desc !!} </td>
				         <td> {{ $kegiatan->name }} </td>
						 <td>
            				<img style="width:30%" src="{{URL::asset('images/kegiatan/thumbs/'.$kegiatan->img)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\KegiatanController@edit",array($kegiatan->id))}}'>edit</a>
							<a href='{{URL::action("admin\KegiatanController@show",array($kegiatan->id))}}'>show</a>
							<form id="kegiatan{{$kegiatan->id}}" action='{{URL::action("admin\KegiatanController@destroy",array($kegiatan->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('kegiatan{{$kegiatan->id}}').submit();">delete</a>
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