@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Alur Pendaftaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('flow/index')}}">List Alur Pendaftaran</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($flow,['files'=>true,'method'=>'put','action'=>['admin\FlowController@update',$flow->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("desc", "Keterangan", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
                {{ Form::textarea("desc", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('title')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("img", "Gambar", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("img") }}
                <span style="color:#000000">Rekomendasi ukuran gambar: 1024x800</span>
                <span class="error">{{$errors->first('img')}}</span>
                <td>
                    <img style="width:70%" src="{{URL::asset('images/flow/'.$flow->img)}}" >
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
@endsection