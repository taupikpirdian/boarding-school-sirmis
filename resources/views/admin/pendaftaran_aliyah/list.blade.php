@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Pendaftaran Aliyah
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('pendaftaran_aliyah/index')}}">List Pendaftaran Aliyah</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchpendaftaran_aliyah','role'=>'search'])  !!}
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
          			<a href="{{ route('export.file_aliyah',['type'=>'xls']) }}"> <span class="glyphicon glyphicon-save-file"></span> Save File </a>
        		</button>
				<!-- <a href="{{URL::to('pendaftaran_aliyah/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a> -->
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
					   @foreach($pendaftaran_aliyah as $i=>$pendaftaran_aliyahs)
					     	<tr>
					     	 <td>{{$i+1}}</td>
					         <td> {{ $pendaftaran_aliyahs->nm_lengkap }} </td>
					         <td> {{ $pendaftaran_aliyahs->tempat_lahir }} </td>
					         <td> {{ $pendaftaran_aliyahs->tanggal_lahir }} </td>
					         <td> {{ $pendaftaran_aliyahs->alamat_siswa }} </td>
					         <td> {{ $pendaftaran_aliyahs->jk }} </td>
					         <td> {{ $pendaftaran_aliyahs->no_tlp }} </td>
					         <td> {{ $pendaftaran_aliyahs->ukuran_seragam }} </td>
					         <td> {{ $pendaftaran_aliyahs->pesantren }} </td>
					         <td> <img style="width:100px" src="{{URL::asset('images/pendaftaran/tsanawiyah/thumbs/'.$pendaftaran_aliyahs->photo)}}" > </td>

					         <td> {{ $pendaftaran_aliyahs->nama_ibu }} </td>
					         <td> {{ $pendaftaran_aliyahs->tmpt_lahir_ibu }} </td>
					         <td> {{ $pendaftaran_aliyahs->alamat_ibu }} </td>
					         <td> {{ $pendaftaran_aliyahs->pekerjaan_ibu }} </td>
					         <td> {{ $pendaftaran_aliyahs->penghasilan_ibu }} </td>
					         <td> {{ $pendaftaran_aliyahs->pendidikan_ibu }} </td>
					         <td> {{ $pendaftaran_aliyahs->no_tlp_ibu }} </td>

					         <td> {{ $pendaftaran_aliyahs->nama_ayah }} </td>
					         <td> {{ $pendaftaran_aliyahs->tmpt_lahir_ayah }} </td>
					         <td> {{ $pendaftaran_aliyahs->alamat_ayah }} </td>
					         <td> {{ $pendaftaran_aliyahs->pekerjaan_ayah }} </td>
					         <td> {{ $pendaftaran_aliyahs->penghasilan_ayah }} </td>
					         <td> {{ $pendaftaran_aliyahs->pendidikan_ayah }} </td>
					         <td> {{ $pendaftaran_aliyahs->no_tlp_ayah }} </td>
					         <td>
								<!-- <a href='{{URL::action("admin\PendaftaranAliyahController@edit",array($pendaftaran_aliyahs->id))}}'>edit</a> -->
								<a href='{{URL::action("admin\PendaftaranTsanawiyahController@show",array($pendaftaran_aliyahs->id))}}'>show</a>
								<form id="delete_pendaftaran_tsanawiyah{{$pendaftaran_aliyahs->id}}" action='{{URL::action("admin\PendaftaranTsanawiyahController@destroy",array($pendaftaran_aliyahs->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('delete_pendaftaran_tsanawiyah{{$pendaftaran_aliyahs->id}}').submit();">delete</a>
							</form>
							</td>	         
					     	</tr>
						   @endforeach
					</tstatus>
				</table>
			{!! $pendaftaran_aliyah->render() !!}
			</div>	
		</div>
	</div>
</section>
@endsection