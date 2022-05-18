@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Tentang Pesantren
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('tentang-pesantren/index')}}">List Tentang Pesantren</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
          {{ Form::open(array('url' => 'tentang-pesantren/create', 'files' => true, 'method' => 'post')) }}
          <div class='form-group clearfix'>
            {{ Form::label("desc", "Deskripsi", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("desc", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('desc')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("img", "Foto", ['class' => 'col-md-2 control-label']) }}
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
  <!-- wysiwig -->  
   <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection
