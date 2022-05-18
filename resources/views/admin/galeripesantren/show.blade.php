@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Galeri
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('galeri_pesantren/index')}}">List Galeri</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Judul</td>
            <td>
              {{{$galeri_pesantren->title}}}
            </td>
          </tr>

          <tr>
            <td>Gambar</td>
            <td> 
            <img style="width:30%" src="{{URL::asset('images/galeri/pesantren/thumbs/'.$galeri_pesantren->img)}}" > 
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('galeri_pesantren/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection