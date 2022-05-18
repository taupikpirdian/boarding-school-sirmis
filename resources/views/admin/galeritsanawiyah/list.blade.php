@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Galeri Tsanawiyah
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('galeri_tsanawiyah/index')}}">List Galeri Tsanawiyah</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchgaleri_tsanawiyah','role'=>'search'])  !!}
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
				<a href="{{URL::to('galeri_tsanawiyah/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
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
				   @foreach($galeri_tsanawiyah as $i=>$galeri_tsanawiyahs)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $galeri_tsanawiyahs->title }} </td>
				         <td>
            				<img style="width:30%" src="{{URL::asset('images/galeri/tsanawiyah/thumbs/'.$galeri_tsanawiyahs->img)}}" >
            			</td>
				         <td>
							<a href='{{URL::action("admin\GaleriTsanawiyahController@edit",array($galeri_tsanawiyahs->id))}}'>edit</a>
							<a href='{{URL::action("admin\GaleriTsanawiyahController@show",array($galeri_tsanawiyahs->id))}}'>show</a>
							<form id="delete_galeri_tsanawiyah{{$galeri_tsanawiyahs->id}}" action='{{URL::action("admin\GaleriTsanawiyahController@destroy",array($galeri_tsanawiyahs->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('delete_galeri_tsanawiyah{{$galeri_tsanawiyahs->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $galeri_tsanawiyah->render() !!}
		</div>
	</div>
</section>
@endsection