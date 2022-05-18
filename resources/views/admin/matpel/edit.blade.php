@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Mata Pelajaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('matpel/index')}}">List Mata Pelajaran</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($matpel,['files' => true, 'method'=>'put','action'=>['admin\MatpelController@update',$matpel->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("matpel", "Mata Pelajaran", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("matpel", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('matpel')}}</span>
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