@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kegiatan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('kegiatan/index')}}">List Kegiatan</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
            <td>Judul</td>
            <td>
              {{ $kegiatan->title }}
            </td>
          </tr>

          <tr>
            <td>Isi</td>
            <td>
              {!! $kegiatan->desc !!}
            </td>
          </tr>

          <tr>
            <td>Kategori</td>
            <td>
              {{ $kegiatan->name }}
            </td>
          </tr>

          <tr>
            <td>Gambar</td>
            <td>
              <img style="width:30%" src="{{URL::asset('images/kegiatan/thumbs/'.$kegiatan->img)}}" > 
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('pembiayaan/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection