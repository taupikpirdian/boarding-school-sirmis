@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Pimpinan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('pimpinan_lembaga/index')}}">Pimpinan</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Nama</td>
            <td>
              {{{$pimpinan_lembaga->name}}}
            </td>
          </tr>

          <tr>
            <td>Mata Pelajaran</td>
            <td>
              {{{$pimpinan_lembaga->jabatan}}}
            </td>
          </tr>

          <tr>
            <td>Awal mengajar di pesantren</td>
            <td>
              {{{$pimpinan_lembaga->kategori_pimpinan}}}
            </td>
          </tr>

          <tr>
            <td>Foto</td>
            <td> <img style="width:30%" src="{{URL::asset('images/pimpinan/thumbs/'.$pimpinan_lembaga->img)}}" > 
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('pimpinan_lembaga/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection