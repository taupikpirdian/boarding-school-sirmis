@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Kegiatan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('kegiatan/index')}}">List Kegiatan</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
          {{ Form::open(array('url' => 'kegiatan/create', 'files' => true, 'method' => 'post')) }}

          <div class='form-group clearfix'>
            {{ Form::label("title", "Judul", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
                {{ Form::text("title", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('title')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("desc", "Isi", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
                {{ Form::textarea("desc", '',['class' => 'form-control required', 'id' => 'deskripsi']) }}
                <span class="error">{{$errors->first('desc')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("kategori_id", "Kategori", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
                {{ Form::select("kategori_id", $kategori,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('kategori_id')}}</span>
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

@endsection

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
@endsection