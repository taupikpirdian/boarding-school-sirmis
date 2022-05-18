@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Kategori Testimoni
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('kategori_testimoni/index')}}">List Kategori Pimpinan</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
			
			<div class='pull-right'>
				<a href="{{URL::to('kategori_testimoni/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Kategori Testimoni</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($kategori_testimoni as $i=>$kategori_testimonis)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $kategori_testimonis->name }} </td>
				         <td>
							<a href='{{URL::action("admin\KategoriTestimoniController@edit",array($kategori_testimonis->id))}}'>edit</a>
							<form id="kategori_testimoni{{$kategori_testimonis->id}}" action='{{URL::action("admin\KategoriTestimoniController@destroy",array($kategori_testimonis->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('kategori_testimoni{{$kategori_testimonis->id}}').submit();">delete</a>
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