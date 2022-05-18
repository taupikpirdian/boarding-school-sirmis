@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section class="content-header">
    <h1>
      Biodata Guru Mts
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('biodata_guru_mts/index')}}">List Biodata Guru Mts</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($biodata_guru_mts,['files'=>true,'method'=>'put','action'=>['admin\BiodataGuruMtsController@update',$biodata_guru_mts->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("nama", "Nama", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("nama", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('nama')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("nip", "NIP", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("nip", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('nip')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("tempat_lahir", "Tempat Lahir", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("tempat_lahir", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('tempat_lahir')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("tanggal_lahir", "Tanggal Lahir", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="required datepicker2" value="{{$biodata_guru_mts->tanggal_lahir}}" )}}'/>
                <span class="error">{{$errors->first('tanggal_lahir')}}</span>
              </div>
          </div>


          <div class='form-group clearfix'>
            {{ Form::label("jk", "Jenis Kelamin", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                <select class="form-control" name="jk">
                  <option value="L">L</option>
                  <option value="P">P</option>
                </select>
                <span class="error">{{$errors->first('jk')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("status", "Status", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                <select class="form-control" name="status">
                  <option value="menikah">menikah</option>
                  <option value="belum menikah">belum menikah</option>
                  <option value="cerai hidup">cerai hidup</option>
                  <option value="cerai mati">cerai mati</option>
                </select>
                <span class="error">{{$errors->first('status')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("alamat", "Alamat", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("alamat", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('alamat')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("matpel", "Mata Pelajaran", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("matpel", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('matpel')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("awal_masuk", "Awal Masuk", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                <input type="text" id="awal_masuk" name="awal_masuk" class="required datepicker2" value="{{$biodata_guru_mts->tanggal_lahir}}")}}'/>
                <span class="error">{{$errors->first('awal_masuk')}}</span>
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
            <button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span>Save</button>
          </div>
        </div>
      {!! Form::close() !!}
      </div>
    </div>
  </section>
@endsection