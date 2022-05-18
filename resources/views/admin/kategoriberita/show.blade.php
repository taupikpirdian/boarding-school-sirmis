@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Berita
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('kategori_berita/index')}}">List Kategori Berita</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Kategori Berita</td>
            <td>
              {{{$kategori_berita->kategori_berita}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('kategori_berita/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection