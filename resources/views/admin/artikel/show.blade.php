@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Artikel
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="{{URL::to('artikel/index')}}">List Artikel</a></li>
  </ol>
</section></br></br>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-hover">

        <tr>
          <td>Judul</td>
          <td>
            {{{$artikel->judul}}}
          </td>
        </tr>

        <tr>
          <td>Kategori</td>
          <td>
            {{{$artikel->id_kategori}}}
          </td>
        </tr>

        <tr>
          <td>Isi</td>
          <td>
            {!! $artikel->isi !!}
          </td>
        </tr>

        <tr>
          <td>Gambar</td>
          <td> <img style="width:30%" src="{{URL::asset('images/artikel/thumbs/'.$artikel->img)}}" > 
          </td>
        </tr>

        <tr>
          <td>File</td>
          <td>
            <a href="{{URL::to('/assets/file/artikel/'.$artikel->file)}}">DOWNLOAD 
              {!! $artikel->file !!}
            </a> 
          </td>
        </tr>

      </table>

      <p align="center">
        <a href="{{URL::to('artikel/index')}}" class="btn btn-primary" role="button">kembali</a>
      </p>
      
    </div>
  </div>
</section>
@endsection