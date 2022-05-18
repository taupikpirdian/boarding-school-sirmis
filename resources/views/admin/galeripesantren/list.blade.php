@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Galeri
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('galeri_pesantren/index')}}">List Galeri</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchgaleri_pesantren','role'=>'search'])  !!}
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
				<a href="{{URL::to('galeri_pesantren/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Judul</b></th>
				       	<th><b>Kategori</b></th>
				       	<th><b>Gambar</b></th>
				       	
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($galeri_pesantren as $i=>$galeri_pesantrens)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $galeri_pesantrens->title }} </td>
				         <td> {{ $galeri_pesantrens->kategori_galeri }} </td>
				         <td>
            				<img style="width:30%" src="{{URL::asset('images/galeri/pesantren/thumbs/'.$galeri_pesantrens->img)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\GaleriPesantrenController@edit",array($galeri_pesantrens->id))}}'>edit</a>
							<a href='{{URL::action("admin\GaleriPesantrenController@show",array($galeri_pesantrens->id))}}'>show</a>
							<form id="delete_galeri_pesantren{{$galeri_pesantrens->id}}" action='{{URL::action("admin\GaleriPesantrenController@destroy",array($galeri_pesantrens->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('delete_galeri_pesantren{{$galeri_pesantrens->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $galeri_pesantren->render() !!}
		</div>
	</div>
</section>
@endsection