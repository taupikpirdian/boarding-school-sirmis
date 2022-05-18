@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section class="content-header">
    <h1>
      Detail Lembaga
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('detail_lembaga/index')}}">List Detail Lembaga</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($detail_lembaga,['files'=>true,'method'=>'put','action'=>['admin\DetailLembagaController@update',$detail_lembaga->id]]) !!}
          
                    <div class='form-group clearfix'>
            {{ Form::label("deskripsi", "Deskripsi", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("deskripsi", null,['class' => 'form-control required', 'id' => 'ckeditor']) }}
                <span class="error">{{$errors->first('deskripsi')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_kategori", "Kategori", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_kategori", $kategori_lembaga, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_kategori')}}</span>
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