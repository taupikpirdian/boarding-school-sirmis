@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Status Guru
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('status_guru/index')}}">List Status Guru</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
            {{ Form::open(array('url' => 'status_guru/create', 'files' => true, 'method' => 'post')) }}

          <div class='form-group clearfix'>
            {{ Form::label("status_guru", "Status Guru", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("status_guru", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('status_guru')}}</span>
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
