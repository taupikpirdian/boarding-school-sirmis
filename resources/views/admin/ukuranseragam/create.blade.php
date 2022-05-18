@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Ukuran Seragam
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('ukuran_seragam/index')}}">List Ukuran Seragam</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
            {{ Form::open(array('url' => 'ukuran_seragam/create', 'files' => true, 'method' => 'post')) }}

          <div class='form-group ukuran_seragam'>
            {{ Form::label("kategori_artikel", "Ukuran Seragam", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("ukuran_seragam", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('ukuran_seragam')}}</span>
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
