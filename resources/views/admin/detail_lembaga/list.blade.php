@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>
	  	Detail Lembaga
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('detail_lembaga/index')}}">Detail Lembaga</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchdetail_lembaga','role'=>'search'])  !!}
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
				<a href="{{URL::to('detail_lembaga/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>create</a>
			</div><br>
				
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Deskripsi</b></th>
				       	<th><b>Kategori</b></th>
				       	<th class='text-center' style='width:70px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($detail_lembaga as $i=>$detail_lembagas)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td>
                            <div class="smaller lighter">
                                <span>{!! str_limit($detail_lembagas->deskripsi, 100) !!}</span>
                                <a href='{{URL::action("admin\DetailLembagaController@show",array($detail_lembagas->id))}}'> Lihat Selengkapnya</a>
                            </div>
                         </td>
				         <td> {{ $detail_lembagas->kategori_lembaga }} </td>
				         <td>
							<a href='{{URL::action("admin\DetailLembagaController@edit",array($detail_lembagas->id))}}'>edit</a>
							<a href='{{URL::action("admin\DetailLembagaController@show",array($detail_lembagas->id))}}'>show</a>
							<form id="detail_lembaga{{$detail_lembagas->id}}" action='{{URL::action("admin\DetailLembagaController@destroy",array($detail_lembagas->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('detail_lembaga{{$detail_lembagas->id}}').submit();">delete</a>
							</form>
						</td>	         
				     	</tr>
					   @endforeach
				</tstatus>
			</table>
			{!! $detail_lembaga->render() !!}
		</div>
	</div>
</section>
@endsection