@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Lokasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('lokasi_sirmis/index')}}">List Lokasi</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($lokasi_sirmis,['files' => true, 'method'=>'put','action'=>['admin\LokasiSirmisController@update',$lokasi_sirmis->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("alamat", "Alamat", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("alamat", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('alamat')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("kontak", "Kontak", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("kontak", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('kontak')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("email", "Email", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("email", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('email')}}</span>
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

   <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection