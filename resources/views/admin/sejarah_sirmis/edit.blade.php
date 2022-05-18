@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Sejarah
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('sejarah_sirmis/index')}}">List Sejarah</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($sejarah_sirmis,['method'=>'put','action'=>['admin\SejarahController@update',$sejarah_sirmis->id]]) !!}

          <div class='form-group clearfix'>
            {{ Form::label("sejarah", "Sejarah", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("sejarah", null,['class' => 'form-control required', 'id' => 'deskripsi']) }}
                <span class="error">{{$errors->first('sejarah')}}</span>
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

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
@endsection