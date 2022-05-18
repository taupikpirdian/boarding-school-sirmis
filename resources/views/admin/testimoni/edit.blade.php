@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
    Testimoni
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('testimoni/index')}}">List Testimoni</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($testimoni,['files' => true, 'method'=>'put','action'=>['admin\TestimoniController@update',$testimoni->id]]) !!}
          
        <div class='form-group clearfix'>
            {{ Form::label("name", "Nama", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("name", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('name')}}</span>
              </div>
          </div>

           <div class='form-group clearfix'>
            {{ Form::label("status_id", "Status", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("status_id", $kategori_testimonis, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('status_id')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("desc", "Deskripsi Testimoni", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("desc", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('desc')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("img", "Foto", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("img") }}
                <span class="error">{{$errors->first('img')}}</span>
                <td>
                    <img style="width:70%" src="{{URL::asset('images/testimoni/'.$testimoni->img)}}" >
                </td>
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
  <!-- wysiwig -->  
   <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection