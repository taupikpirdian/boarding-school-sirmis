@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

  <section class="content-header">
    <h1>
        Biodata Guru Pesantren
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('biodata_guru_pesantren/index')}}">List Biodata Guru Pesantren</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
    {{ Form::open(array('url' => 'biodata_guru_pesantren/create', 'files' => true, 'method' => 'post')) }}
          
          <div class='form-group clearfix'>
            {{ Form::label("nama", "Nama", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("nama", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('nama')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("nip", "NIP", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("nip", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('nip')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("tempat_lahir", "Tempat Lahir", ['class' => 'col-md-2 control-label']) }}
             <div class='col-md-4'>
                <input type="text" id="tempat_lahir" name="tempat_lahir" )}}'/>
                <span class="error">{{$errors->first('tempat_lahir')}}</span>
              </div>
          </div>
          
            <div class='form-group clearfix'>
              {{ Form::label("tanggal_lahir", "Tanggal Lahir", ['class' => 'col-md-2 control-label']) }}
                <div class='col-md-4'>
                    {{ Form::text('tanggal_lahir', '', ['id' => 'datepicker']) }}
                  <span class="error" style="color: red;">{{$errors->first('tanggal_lahir')}}</span>
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
            {{ Form::label("id_status", "Status", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_status", $status_guru, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_status')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("alamat", "Alamat", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("alamat", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('alamat')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_matapelajaran", "Mata Pelajaran", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_matapelajaran", $matpel, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_matapelajaran')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_kategori", "Kategori", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_kategori", $kategori_guru, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_kategori')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
              {{ Form::label("awal_masuk", "Awal Masuk", ['class' => 'col-md-2 control-label']) }}
                <div class='col-md-4'>
                    {{ Form::text('awal_masuk', '', ['id' => 'datepicker2']) }}
                  <span class="error" style="color: red;">{{$errors->first('awal_masuk')}}</span>
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
@endsection

@section ('js')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
    $(function() {
      $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        forceParse: false
      });
    });

    $(function() {
      $("#datepicker2").datepicker({
        dateFormat: "dd-mm-yy",
        forceParse: false
      });
    });
    </script>
@endsection