@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Ukuran Seragam
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('ukuran_seragam/index')}}">List Ukuran Seragam</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($ukuran_seragam,['files' => true, 'method'=>'put','action'=>['admin\UkuranSeragamController@update',$ukuran_seragam->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("ukuran_seragam", "Ukuran Seragam", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("ukuran_seragam", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('ukuran_seragam')}}</span>
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