@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Pendidikan Orang Tua
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('pendidikan_ortu/index')}}">List Pendidikan Orang Tua</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($pendidikan_ortu,['files' => true, 'method'=>'put','action'=>['admin\PendidikanOrtuController@update',$pendidikan_ortu->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("pendidikan_ortu", "Pendidikan Orang Tua", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("pendidikan_ortu", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('pendidikan_ortu')}}</span>
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