@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Artikel
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('artikel/index')}}">List Artikel</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
            {{ Form::open(array('url' => 'artikel/create', 'files' => true, 'method' => 'post')) }}

          <div class='form-group clearfix'>
            {{ Form::label("judul", "Judul", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("judul", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('judul')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("isi", "Artikel", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("isi", '',['class' => 'form-control required', 'id' => 'ckeditor']) }}
                <span class="error">{{$errors->first('isi')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_kategori", "Kategori", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_kategori", $kategori_artikel, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_kategori')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("img", "Gambar", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("img") }}
                <span class="error">{{$errors->first('img')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("file", "File", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("file") }}
                <span class="error">{{$errors->first('file')}}</span>
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
