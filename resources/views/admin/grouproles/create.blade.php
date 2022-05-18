@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Input Data Group Roles
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('group-roles')}}">List Data Group Roles</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {!! Form::open(['action' => 'admin\GroupRoleController@store']) !!}
          <div class='form-group clearfix'>
            {{ Form::label("Group", "Group", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('group_id', $groups, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('alamat')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("Role", "Role", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('role_id', $roles, null,['class' => 'form-control required']) }}
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

