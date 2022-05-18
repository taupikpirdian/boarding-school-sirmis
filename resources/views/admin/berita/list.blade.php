@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Berita
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('berita/index')}}">List Berita</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchberita','role'=>'search'])  !!}
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
				<a href="{{URL::to('berita/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Judul</b></th>
				       	<th><b>Kategori</b></th>
				       	<th><b>Isi</b></th>
				       	<th><b>Gambar</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($berita as $i=>$beritas)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $beritas->judul }} </td>
				         <td> {{ $beritas->kategori_berita }} </td>
				         <td>
                            <div class="smaller lighter">
                            <span>{!! str_limit($beritas->isi, 100) !!}</span>
                            	<a href='{{URL::action("admin\BeritaController@show",array($beritas->id))}}'> Lihat Selengkapnya</a>
                            </div>
                          </td>
				          <td>
            				<img style="width:30%" src="{{URL::asset('images/berita/thumbs/'.$beritas->img)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\BeritaController@edit",array($beritas->id))}}'>edit</a>
							<a href='{{URL::action("admin\BeritaController@show",array($beritas->id))}}'>show</a>
							<form id="berita{{$beritas->id}}" action='{{URL::action("admin\BeritaController@destroy",array($beritas->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('berita{{$beritas->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $berita->render() !!}
		</div>
	</div>
</section>
@endsection