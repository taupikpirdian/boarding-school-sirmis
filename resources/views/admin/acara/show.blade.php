@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Acara
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('acara/index')}}">List Acara</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Judul</td>
            <td>
              {{{$acara->judul}}}
            </td>
          </tr>

          <tr>
            <td>Kategori</td>
            <td>
              {{{$acara->id_kategori}}}
            </td>
          </tr>

          <tr>
            <td>Isi</td>
            <td>
              {!! $acara->isi !!}
            </td>
          </tr>

          <tr>
            <td>Gambar</td>
            <td> <img style="width:30%" src="{{URL::asset('images/acara/thumbs/'.$acara->img)}}" > 
            </td>
          </tr>

          <tr>
            <td>Tempat</td>
            <td>
              {{{$acara->tempat}}}
            </td>
          </tr>

          <tr>
            <td>Jam</td>
            <td>
              {{{$acara->jam}}}
            </td>
          </tr>

          <tr>
            <td>Tanggal</td>
            <td>
              {{{$acara->tanggal}}}
            </td>
          </tr>

           <tr>
            <td>Bulan</td>
            <td>
              {{{$acara->bulan}}}
            </td>
          </tr>

           <tr>
            <td>Tahun</td>
            <td>
              {{{$acara->tahun}}}
            </td>
          </tr>

          <tr>
            <td>Biaya</td>
            <td>
              {{{$acara->biaya}}}
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('acara/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection