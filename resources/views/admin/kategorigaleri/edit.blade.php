@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Galeri
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('kategori_galeri/index')}}">List Kategori Galeri</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($kategori_galeri,['files' => true, 'method'=>'put','action'=>['admin\KategoriGaleriController@update',$kategori_galeri->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("kategori_galeri", "Kategori Galeri", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("kategori_galeri", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('kategori_galeri')}}</span>
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