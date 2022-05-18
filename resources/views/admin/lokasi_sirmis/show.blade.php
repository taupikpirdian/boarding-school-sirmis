@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Lokasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('lokasi_sirmis/index')}}">List Lokasi</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Alamat</td>
            <td>
              {{{$lokasi_sirmis->alamat}}}
            </td>
          </tr>

          <tr>
            <td>Kontak</td>
            <td>
              {{{$lokasi_sirmis->kontak}}}
            </td>
          </tr>

          <tr>
            <td>Email</td>
            <td>
              {{{$lokasi_sirmis->email}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('lokasi_sirmis/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection