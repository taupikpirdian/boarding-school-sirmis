@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Tentang Pesantren
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('tentang-pesantren/index')}}">List Tentang Pesantren</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
				
			<div class='pull-right'>
				<a href="{{URL::to('tentang-pesantren/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Deskripsi</b></th>
				       	<th style='width:170px'><b>Gambar</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($abouts as $i=>$about)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $about->desc }} </td>
			             <td>
            				<img style="width:30%" src="{{URL::asset('images/tentang_pesantren/thumbs/'.$about->img)}}" >
            			 </td>
				         <td>
							<a href='{{URL::action("admin\TentangPesantrenController@edit",array($about->id))}}'>edit</a>
							<form id="abouts{{$about->id}}" action='{{URL::action("admin\TentangPesantrenController@destroy",array($about->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('abouts{{$about->id}}').submit();">delete</a>
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