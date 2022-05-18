@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Biodata Guru Aliyah
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('biodata_guru_aliyah/index')}}">List Biodata Guru Aliyah</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Nama</td>
            <td>
              {{{$biodata_guru_aliyah->nama}}}
            </td>
          </tr>

          <tr>
            <td>NIP</td>
            <td>
              {{{$biodata_guru_aliyah->nip}}}
            </td>
          </tr>

          <tr>
            <td>Tempat Lahir</td>
            <td>
              {{{$biodata_guru_aliyah->tempat_lahir}}}
            </td>
          </tr>

          <tr>
            <td>Tanggal Lahir</td>
            <td>
              {{{$biodata_guru_aliyah->tanggal_lahir}}}
            </td>
          </tr>

          <tr>
            <td>Jenis Kelamin</td>
            <td>
              {{{$biodata_guru_aliyah->jk}}}
            </td>
          </tr>

          <tr>
            <td>Status</td>
            <td>
              {{{$biodata_guru_aliyah->status}}}
            </td>
          </tr>

          <tr>
            <td>Alamat</td>
            <td>
              {{{$biodata_guru_aliyah->alamat}}}
            </td>
          </tr>

          <tr>
            <td>Mata Pelajaran</td>
            <td>
              {{{$biodata_guru_aliyah->matpel}}}
            </td>
          </tr>

          <tr>
            <td>Awal mengajar di pesantren</td>
            <td>
              {{{$biodata_guru_aliyah->awal_masuk}}}
            </td>
          </tr>

          <tr>
            <td>Foto</td>
            <td> <img style="width:30%" src="{{URL::asset('images/biodata/guru/aliyah/thumbs/'.$biodata_guru_aliyah->img)}}" > 
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('biodata_guru_aliyah/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection