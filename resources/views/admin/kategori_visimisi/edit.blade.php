@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Visi Misi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('kategori_visimisi/index')}}">List Kategori Visi Misi</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($kategori_visimisi,['files' => true, 'method'=>'put','action'=>['admin\KategoriVisiMisiController@update',$kategori_visimisi->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("kategori_visimisi", "Struktur Visi Misi", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("kategori_visimisi", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('kategori_visimisi')}}</span>
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