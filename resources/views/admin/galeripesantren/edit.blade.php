@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Galeri Pesantren
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('galeri_pesantren/index')}}">List Galeri Pesantren</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($galeri_pesantren,['files'=>true,'method'=>'put','action'=>['admin\GaleriPesantrenController@update',$galeri_pesantren->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("title", "Judul", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("title", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('title')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_kategori", "Kategori", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_kategori", $kategori_galeri, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_kategori')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("img", "Gambar", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("img") }}
                <span class="error">{{$errors->first('img')}}</span>
                <td>
                    <img style="width:70%" src="{{URL::asset('images/galeri/pesantren/'.$galeri_pesantren->img)}}" >
                </td>
              </div>
          </div>
          
        <div class='form-group'>
        	<div class='col-md-4 col-md-offset-2'>
          	<button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span>Save</button>
        	</div>
      	</div>
      {!! Form::close() !!}
    	</div>
  	</div>
	</section>
@endsection