@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Visi dan Misi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('visi_misi/index')}}">List Visi dan Misi</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Visi</td>
            <td>
              {!! $visi_misi->visi !!}
            </td>
          </tr>

          <tr>
            <td>Misi</td>
            <td>
              {!! $visi_misi->misi !!}
            </td>
          </tr>

          <tr>
            <td>Kategori</td>
            <td>
              {{{$visi_misi->kategori_visimisi}}}
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('visi_misi/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection