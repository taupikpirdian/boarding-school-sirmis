@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Lokasi
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('lokasi_sirmis/index')}}">List Lokasi</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchlokasi_sirmis','role'=>'search'])  !!}
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
				<a href="{{URL::to('lokasi_sirmis/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Alamat</b></th>
				       	<th><b>Kontak</b></th>
				       	<th><b>Email</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($lokasi_sirmis as $i=>$lokasi_sirmiss)
				     	<tr>
				     	<td>{{$i+1}}</td>
				        <td> {{ $lokasi_sirmiss->alamat }} </td>
				        <td> {{ $lokasi_sirmiss->kontak }} </td>
            			<td> {{ $lokasi_sirmiss->email }} </td>
				        <td>
							<a href='{{URL::action("admin\LokasiSirmisController@edit",array($lokasi_sirmiss->id))}}'>edit</a>
							<a href='{{URL::action("admin\LokasiSirmisController@show",array($lokasi_sirmiss->id))}}'>show</a>
							<form id="lokasi_sirmis{{$lokasi_sirmiss->id}}" action='{{URL::action("admin\LokasiSirmisController@destroy",array($lokasi_sirmiss->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('lokasi_sirmis{{$lokasi_sirmiss->id}}').submit();">delete</a>
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