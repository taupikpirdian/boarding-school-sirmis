@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
    Testimoni
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('testimoni/index')}}">List Testimoni</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
            <td>Nama</td>
            <td>
              {{{$testimoni->name}}}
            </td>
          </tr>

          <tr>
            <td>Status</td>
            <td>
              {{{$testimoni->kategori}}}
            </td>
          </tr>

          <tr>
            <td>Isi Testimoni</td>
            <td>
              {!! $testimoni->desc !!}
            </td>
          </tr>

          <tr>
            <td>Foto</td>
            <td> <img style="width:30%" src="{{URL::asset('images/testimoni/'.$testimoni->img)}}" > 
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('testimoni/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection