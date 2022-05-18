@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Detail Lembaga
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('detail_lembaga/index')}}">Detail Lembaga</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Deskripsi</td>
            <td>
              {!! $detail_lembaga->deskripsi !!}
            </td>
          </tr>

          <tr>
            <td>Kategori Lembaga</td>
            <td>
              {{{$detail_lembaga->kategori_lembaga}}}
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('detail_lembaga/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection