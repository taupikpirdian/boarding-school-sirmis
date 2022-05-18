@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Pimpinan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('kategori_pimpinan/index')}}">List Kategori Pimpinan</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($kategori_pimpinan,['files' => true, 'method'=>'put','action'=>['admin\KategoriPimpinanController@update',$kategori_pimpinan->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("kategori_pimpinan", "Struktur Pimpinan", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("kategori_pimpinan", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('kategori_pimpinan')}}</span>
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