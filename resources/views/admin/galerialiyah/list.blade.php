@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Galeri Aliyah
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('galeri_aliyah/index')}}">List Galeri Aliyah</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchgaleri_aliyah','role'=>'search'])  !!}
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
				<a href="{{URL::to('galeri_aliyah/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Judul</b></th>
				       	<th><b>Gambar</b></th>
				       	
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($galeri_aliyah as $i=>$galeri_aliyahs)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $galeri_aliyahs->title }} </td>
				         <td>
            				<img style="width:30%" src="{{URL::asset('images/galeri/aliyah/thumbs/'.$galeri_aliyahs->img)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\GaleriAliyahController@edit",array($galeri_aliyahs->id))}}'>edit</a>
							<a href='{{URL::action("admin\GaleriAliyahController@show",array($galeri_aliyahs->id))}}'>show</a>
							<form id="delete_galeri_aliyah{{$galeri_aliyahs->id}}" action='{{URL::action("admin\GaleriAliyahController@destroy",array($galeri_aliyahs->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('delete_galeri_aliyah{{$galeri_aliyahs->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $galeri_aliyah->render() !!}
		</div>
	</div>
</section>
@endsection