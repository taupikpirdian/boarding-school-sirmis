@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Persyaratan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('persyaratan_pendaftaran/index')}}">List Persyaratan</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {!! Form::open(['action' => 'admin\PersyaratanController@store']) !!}

          <div class='form-group clearfix'>
            {{ Form::label("text", "Deskripsi", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("text", '',['class' => 'form-control required', 'id' => 'deskripsi']) }}
                <span class="error">{{$errors->first('text')}}</span>
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
