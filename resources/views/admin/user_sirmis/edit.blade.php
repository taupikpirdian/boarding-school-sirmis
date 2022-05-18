@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Users
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('user_sirmis/index')}}">List Users</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($user_sirmis,['files'=>true,'method'=>'put','action'=>['admin\UsersController@update',$user_sirmis->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("name", "Nama", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("name") }}
                <span class="error">{{$errors->first('name')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("email", "Email", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("email") }}
                <span class="error">{{$errors->first('email')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("password", "Password", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("password") }}
                <span class="error">{{$errors->first('password')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("photo", "Photo", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("photo") }}
                <span class="error">{{$errors->first('photo')}}</span>
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