@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Visi Misi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('kategori_visimisi/index')}}">List Kategori Visi Misi</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Kategori Visi Misi</td>
            <td>
              {{{$kategori_visimisi->kategori_visimisi}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('kategori_visimisi/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection