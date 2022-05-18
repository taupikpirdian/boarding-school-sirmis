@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Berita
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('berita/index')}}">List Berita</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Judul</td>
            <td>
              {{{$berita->judul}}}
            </td>
          </tr>

          <tr>
            <td>Kategori</td>
            <td>
              {{{$berita->kategori_berita}}}
            </td>
          </tr>

          <tr>
            <td>Isi</td>
            <td>
              {!! $berita->isi !!}
            </td>
          </tr>

          <tr>
            <td>Gambar</td>
            <td> <img style="width:30%" src="{{URL::asset('images/berita/thumbs/'.$berita->img)}}" > 
            </td>
          </tr>


        </table>

        <p align="center">
          <a href="{{URL::to('berita/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection