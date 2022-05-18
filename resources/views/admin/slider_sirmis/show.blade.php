@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Slider
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('slider_sirmis/index')}}">List Slider</a></li>
    </ol>
  </section></br></br>

   <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>id</td>
            <td>
              {{{$slider_sirmis->id}}}
            </td>
          </tr>

          <tr>
            <td>Judul</td>
            <td>
              {{{$slider_sirmis->title}}}
            </td>
          </tr>

          <tr>
            <td>Deskripsi</td>
            <td>
              {{{$slider_sirmis->desc}}}
            </td>
          </tr>

          <tr>
            <td>Gambar</td>
            <td> <img style="width:30%" src="{{URL::asset('images/slide/thumbs/'.$slider_sirmis->img)}}"> 
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('slider_sirmis/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection