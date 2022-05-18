@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Biodata Guru Pesantren
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('biodata_guru_pesantren/index')}}">List Biodata Guru Pesantren</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Nama</td>
            <td>
              {{{$biodata_guru_pesantren->nama}}}
            </td>
          </tr>

          <tr>
            <td>NIP</td>
            <td>
              {{{$biodata_guru_pesantren->nip}}}
            </td>
          </tr>

          <tr>
            <td>Tempat Lahir</td>
            <td>
              {{{$biodata_guru_pesantren->tempat_lahir}}}
            </td>
          </tr>

          <tr>
            <td>Tanggal Lahir</td>
            <td>
              {{{$biodata_guru_pesantren->tanggal_lahir}}}
            </td>
          </tr>

          <tr>
            <td>Jenis Kelamin</td>
            <td>
              {{{$biodata_guru_pesantren->jk}}}
            </td>
          </tr>

          <tr>
            <td>Status</td>
            <td>
              {{{$biodata_guru_pesantren->status_guru}}}
            </td>
          </tr>

          <tr>
            <td>Alamat</td>
            <td>
              {{{$biodata_guru_pesantren->alamat}}}
            </td>
          </tr>

          <tr>
            <td>Mata Pelajaran</td>
            <td>
              {{{$biodata_guru_pesantren->matpel}}}
            </td>
          </tr>

          <tr>
            <td>Kategori</td>
            <td>
              {{{$biodata_guru_pesantren->kategori_guru}}}
            </td>
          </tr>

          <tr>
            <td>Awal mengajar di pesantren</td>
            <td>
              {{{$biodata_guru_pesantren->awal_masuk}}}
            </td>
          </tr>

          <tr>
            <td>Foto</td>
            <td> <img style="width:20%" src="{{URL::asset('images/biodataguru/pesantren/thumbs/'.$biodata_guru_pesantren->img)}}" > 
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('biodata_guru_pesantren/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection