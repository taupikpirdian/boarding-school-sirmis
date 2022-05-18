@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Input Data Role
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('role/index')}}">List Data Role</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {!! Form::model($role,['method'=>'put','action'=>['admin\RoleController@update',$role->id]]) !!}
          <div class='form-group clearfix'>
            {{ Form::label("Role", "Role", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("name", null,['class' => 'form-control required', 'placeholder' => 'Masukan Nama Role']) }}
                <span class="error">{{$errors->first('alamat')}}</span>
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

