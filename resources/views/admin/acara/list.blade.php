@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Acara
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('acara/index')}}">List Acara</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchacara','role'=>'search'])  !!}
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
				<a href="{{URL::to('acara/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Judul</b></th>
				       	<th><b>Kategori</b></th>
				       	<th><b>Isi</b></th>
				       	<th><b>Gambar</b></th>
				       	<th><b>Tempat</b></th>
				       	<th><b>Jam</b></th>
				       	<th><b>Tanggal</b></th>
				       	<th><b>Bulan</b></th>
				       	<th><b>Tahun</b></th>
				       	<th><b>Biaya</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<status>
				   @foreach($acara as $i=>$acaras)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $acaras->judul }} </td>
				         <td> {{ $acaras->kategori_acara }} </td>
				         <td>
                            <div class="smaller lighter">
                            <span>{!! str_limit($acaras->isi, 100) !!}</span>
                            	<a href='{{URL::action("admin\AcaraController@show",array($acaras->id))}}'> Lihat Selengkapnya</a>
                            </div>
                          </td>
				          <td>
            				<img style="width:30%" src="{{URL::asset('images/acara/thumbs/'.$acaras->img)}}" >
            			</td>
            			<td> {{ $acaras->tempat }} </td>
            			<td> {{ $acaras->jam }} </td>
            			<td> {{ $acaras->tanggal }} </td>
            			<td> {{ $acaras->bulan }} </td>
            			<td> {{ $acaras->tahun }} </td>
            			<td> {{ $acaras->biaya }} </td>
				         <td>
							<a href='{{URL::action("admin\AcaraController@edit",array($acaras->id))}}'>edit</a>
							<a href='{{URL::action("admin\AcaraController@show",array($acaras->id))}}'>show</a>
							<form id="acara{{$acaras->id}}" action='{{URL::action("admin\AcaraController@destroy",array($acaras->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('acara{{$acaras->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $acara->render() !!}
		</div>
	</div>
</section>
@endsection