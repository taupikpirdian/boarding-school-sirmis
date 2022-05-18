@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Prestasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('prestasi_sirmis/index')}}">List Prestasi</a></li>
    </ol>
  </section></br></br>

   <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>id</td>
            <td>
              {{{$prestasi_sirmis->id}}}
            </td>
          </tr>

          <tr>
            <td>Nama Penerima Prestasi</td>
            <td>
              {{{$prestasi_sirmis->name}}}
            </td>
          </tr>

          <tr>
            <td>Deskripsi</td>
            <td>
              {!! $prestasi_sirmis->deskripsi !!}
            </td>
          </tr>

          <tr>
            <td>Gambar</td>
            <td> <img style="width:30%" src="{{URL::asset('images/prestasi/'.$prestasi_sirmis->img)}}"> 
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('prestasi_sirmis/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection