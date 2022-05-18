@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Mondok
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('mondok_sirmis/index')}}">List Mondok</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {{ Form::open(array('url' => 'mondok_sirmis/create', 'files' => true, 'method' => 'post')) }}
          
          <div class='form-group clearfix'>
            {{ Form::label("name", "Mondok", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::text("name", '',['class' => 'form-control required', 'id' => 'ckeditor']) }}
                <span class="error">{{$errors->first('name')}}</span>
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
