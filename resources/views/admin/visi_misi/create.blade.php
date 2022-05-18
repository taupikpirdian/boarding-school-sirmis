@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Visi dan Misi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('visi_misi/index')}}">List Visi Misi</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>

            {{ Form::open(array('url' => 'visi_misi/create', 'files' => true, 'method' => 'post')) }}
            
          <div class='form-group clearfix'>
            {{ Form::label("visi", "VISI", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("visi", '',['class' => 'form-control required', 'id' => 'wysywyg']) }}
                <span class="error">{{$errors->first('visi')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("misi", "MISI", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("misi", '',['class' => 'form-control required', 'id' => 'wysywyg2']) }}
                <span class="error">{{$errors->first('misi')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_kategori", "Kategori", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_kategori", $kategori_visimisi, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_kategori')}}</span>
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
@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'wysywyg' );
    CKEDITOR.replace( 'wysywyg2' );
</script>
@endsection
