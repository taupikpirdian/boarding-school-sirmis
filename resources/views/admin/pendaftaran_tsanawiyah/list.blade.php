@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Pendaftaran Tsanawiyah
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('pendaftaran_tsanawiyah/index')}}">List Pendaftaran Tsanawiyah</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchpendaftaran_tsanawiyah','role'=>'search'])  !!}
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
				<button type="button" class="btn btn-default btn-sm">
          			<a href="{{ route('export.file_tsanawiyah',['type'=>'xls']) }}"> <span class="glyphicon glyphicon-save-file"></span> Save File </a>
        		</button>
				<!-- <a href="{{URL::to('pendaftaran_tsanawiyah/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a> -->
			</div><br>
			<div class="col-md-12 table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Nama Lengkap</b></th>
				       	<th><b>Tempat Lahir</b></th>
				       	<th><b>Tanggal Lahir</b></th>
				       	<th><b>Alamat Siswa</b></th>
				       	<th><b>Jenis Kelamin</b></th>
				       	<th><b>No Hp</b></th>
				       	<th><b>Ukuran Seragam</b></th>
				       	<th><b>Mondok</b></th>
				       	<th><b>Photo</b></th>

				   		<th><b>Nama Ibu</b></th>
				       	<th><b>Tempat Lahir Ibu</b></th>
				       	<th><b>Alamat Ibu</b></th>
				      	<th><b>Pekerjaan Ibu</b></th>
				   		<th><b>Penghasilan Ibu</b></th>
				       	<th><b>Pendidikan Ibu</b></th>
				       	<th><b>No Hp Ibu</b></th>

				       	<th><b>Nama Ayah</b></th>
				       	<th><b>Tempat Lahir Ayah</b></th>
				       	<th><b>Alamat Ayah</b></th>
				       	<th><b>Pekerjaan Ayah</b></th>
				       	<th><b>Penghasilan Ayah</b></th>
				       	<th><b>Pendidikan Ayah</b></th>
				       	<th><b>No Hp Ayah</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($pendaftaran_tsanawiyah as $i=>$pendaftaran_tsanawiyahs)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $pendaftaran_tsanawiyahs->nm_lengkap }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->tempat_lahir }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->tanggal_lahir }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->alamat_siswa }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->jk }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->no_tlp }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->ukuran_seragam }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->pesantren }} </td>
				         <td> <img style="width:100px" src="{{URL::asset('images/pendaftaran/tsanawiyah/thumbs/'.$pendaftaran_tsanawiyahs->photo)}}" > </td>

				         <td> {{ $pendaftaran_tsanawiyahs->nama_ibu }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->tmpt_lahir_ibu }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->alamat_ibu }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->pekerjaan_ibu }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->penghasilan_ibu }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->pendidikan_ibu }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->no_tlp_ibu }} </td>

				         <td> {{ $pendaftaran_tsanawiyahs->nama_ayah }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->tmpt_lahir_ayah }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->alamat_ayah }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->pekerjaan_ayah }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->penghasilan_ayah }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->pendidikan_ayah }} </td>
				         <td> {{ $pendaftaran_tsanawiyahs->no_tlp_ayah }} </td>
				         <td>
							<!-- <a href='{{URL::action("admin\PendaftaranTsanawiyahController@edit",array($pendaftaran_tsanawiyahs->id))}}'>edit</a> -->
							<a href='{{URL::action("admin\PendaftaranTsanawiyahController@show",array($pendaftaran_tsanawiyahs->id))}}'>show</a>
							<form id="delete_pendaftaran_tsanawiyah{{$pendaftaran_tsanawiyahs->id}}" action='{{URL::action("admin\PendaftaranTsanawiyahController@destroy",array($pendaftaran_tsanawiyahs->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('delete_pendaftaran_tsanawiyah{{$pendaftaran_tsanawiyahs->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $pendaftaran_tsanawiyah->render() !!}
			</div>
		</div>
	</div>
</section>
@endsection