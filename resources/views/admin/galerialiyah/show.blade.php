@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Galeri Aliyah
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('galeri_aliyahs/index')}}">List Galeri Aliyah</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Judul</td>
            <td>
              {{{$galeri_aliyah->title}}}
            </td>
          </tr>

          <tr>
            <td>Gambar</td>
            <td> 
            <img style="width:30%" src="{{URL::asset('images/galeri/aliyah/thumbs/'.$galeri_aliyah->img)}}" > 
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('galeri_aliyah/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection