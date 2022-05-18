@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Slider
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('slider_sirmis/index')}}">List Slider</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchslider_sirmis','role'=>'search'])  !!}
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
				<a href="{{URL::to('slider_sirmis/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Judul</b></th>
				       	<th><b>Deskripsi</b></th>
				       	<th><b>Gambar</b></th>
				       	
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($slider_sirmis as $i=>$slider_sirmiss)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td style="width: 100px"> {{ $slider_sirmiss->title }} </td>
				         <td style="width: 400px"> {{ $slider_sirmiss->desc }} </td>
				         <td>
            				<img style="width:30%" src="{{URL::asset('images/slide/thumbs/'.$slider_sirmiss->img)}}" >
            			</td>
				         
				         <td>
							<a href='{{URL::action("admin\SliderController@edit",array($slider_sirmiss->id))}}'>edit</a>
							<a href='{{URL::action("admin\SliderController@show",array($slider_sirmiss->id))}}'>show</a>
							<form id="delete_slider_sirmis{{$slider_sirmiss->id}}" action='{{URL::action("admin\SliderController@destroy",array($slider_sirmiss->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('delete_slider_sirmis{{$slider_sirmiss->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $slider_sirmis->render() !!}
		</div>
	</div>
</section>
@endsection