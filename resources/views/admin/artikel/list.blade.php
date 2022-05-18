@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
		Artikel
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('artikels/index')}}">List Artikel</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchartikel','role'=>'search'])  !!}
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
				<a href="{{URL::to('artikel/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th><b>Judul</b></th>
						<th><b>Kategori</b></th>
						<th><b>Isi</b></th>
						<th><b>Gambar</b></th>
						<th><b>File</b></th>
						<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
					@foreach($artikel as $i=>$artikels)
					<tr>
						<td>{{$i+1}}</td>
						<td> {{ $artikels->judul }} </td>
						<td> {{ $artikels->kategori_artikel }} </td>
						<td>
							<div class="smaller lighter">
								<span>{!! str_limit($artikels->isi, 100) !!}</span>
								<a href='{{URL::action("admin\ArtikelController@show",array($artikels->id))}}'> Lihat Selengkapnya</a>
							</div>
						</td>
						<td>
							<img style="width:30%" src="{{URL::asset('images/artikel/thumbs/'.$artikels->img)}}" >
						</td>
						<td>
							<button type="button" class="btn btn-default btn-sm">
								<a href='{{URL::action("admin\ArtikelController@show",array($artikels->id))}}'>
									<span class="glyphicon glyphicon-download"></span> Download
								</a>
							</button>
						</td>
						<td>
							<a href='{{URL::action("admin\ArtikelController@edit",array($artikels->id))}}'>edit</a>
							<a href='{{URL::action("admin\ArtikelController@show",array($artikels->id))}}'>show</a>
							<form id="artikel{{$artikels->id}}" action='{{URL::action("admin\ArtikelController@destroy",array($artikels->id))}}' method="POST">
								<input type="hidden" name="_method" value="delete">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<a href="#" onclick="document.getElementById('artikel{{$artikels->id}}').submit();">delete</a>
							</form>
						</td>	         
					</tr>
					@endforeach
				</tstatus>
			</table>
			{!! $artikel->render() !!}
		</div>
	</div>
</section>
@endsection