@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Prestasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('prestasi_sirmis/index')}}">List Prestasi</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
            {{ Form::open(array('url' => 'prestasi_sirmis/create', 'files' => true, 'method' => 'post')) }}
          <div class='form-group clearfix'>
            {{ Form::label("name", "Nama Penerima Prestasi", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("name", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('name')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("jenis", "Jenis Prestasi", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("jenis", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('jenis')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("deskripsi", "Deskripsi Berita", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("deskripsi", '',['class' => 'form-control required', 'id' => 'ckeditor']) }}
                <span class="error">{{$errors->first('deskripsi')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("img", "Gambar", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("img") }}
                <span class="error">{{$errors->first('img')}}</span>
              </div>
          </div>
          
          <div class='form-group'>
            <div class='col-md-4 col-md-offset-2'>
              <button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span> Save</button>
            </div>
          </div>
        {!! Form::close() !!}    
      </div>
    </div>
  </section>

   <!-- wysiwig -->  
   <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection
