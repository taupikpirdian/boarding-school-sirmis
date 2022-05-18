@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Galeri
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('kategori_galeri/index')}}">List Kategori Galeri</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Kategori Galeri</td>
            <td>
              {{{$kategori_galeri->kategori_galeri}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('kategori_galeri/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection