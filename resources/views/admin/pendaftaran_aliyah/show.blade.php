@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Pendaftaran Aliyah
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('pendaftaran_aliyah/index')}}">List Pendaftaran Aliyah</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>id</td>
            <td>
              {{{$pendaftaran_aliyah->id}}}
            </td>
          </tr>

          <tr>
            <td>Nama Lengkap</td>
            <td>
              {{{$pendaftaran_aliyah->nm_lengkap}}}
            </td>
          </tr>

          <tr>
            <td>Tempat Lahir</td>
            <td>
              {{{$pendaftaran_aliyah->tempat_lahir}}}
            </td>
          </tr>

          <tr>
            <td>Tanggal Lahir</td>
            <td>
              {{{$pendaftaran_aliyah->tanggal_lahir}}}
            </td>
          </tr>

          <tr>
            <td>Alamat Siswa</td>
            <td>
              {{{$pendaftaran_aliyah->alamat_siswa}}}
            </td>
          </tr>

          <tr>
            <td>Jenis Kelamin</td>
            <td>
              {{{$pendaftaran_aliyah->jk}}}
            </td>
          </tr>

          <tr>
            <td>No Hp Siswa</td>
            <td>
              {{{$pendaftaran_aliyah->no_tlp}}}
            </td>
          </tr>

          <tr>
            <td>Ukuran Seragam</td>
            <td>
              {{{$pendaftaran_aliyah->ukuran_seragam}}}
            </td>
          </tr>

          <tr>
            <td>Pesantren</td>
            <td>
              {{{$pendaftaran_aliyah->pesantren}}}
            </td>
          </tr>

          <tr>
            <td>Photo</td>
            <td> <img style="width:20%" src="{{URL::asset('images/pendaftaran/aliyah/'.$pendaftaran_aliyah->photo)}}" > 
            </td>
          </tr>

          <tr>
            <td>Nama Ibu</td>
            <td>
              {{{$pendaftaran_aliyah->nama_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Tempat Lahir Ibu</td>
            <td>
              {{{$pendaftaran_aliyah->tmpt_lahir_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Alamat Ibu</td>
            <td>
              {{{$pendaftaran_aliyah->alamat_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Pekerjaan Ibu</td>
            <td>
              {{{$pendaftaran_aliyah->pekerjaan_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Penghasilan Ibu</td>
            <td>
              {{{$pendaftaran_aliyah->penghasilan_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Pendidikan Ibu</td>
            <td>
              {{{$pendaftaran_aliyah->pendidikan_ibu}}}
            </td>
          </tr>

          <tr>
            <td>No Hp Ibu</td>
            <td>
              {{{$pendaftaran_aliyah->no_tlp_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Nama Ayah</td>
            <td>
              {{{$pendaftaran_aliyah->nama_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Tempat Lahir Ayah</td>
            <td>
              {{{$pendaftaran_aliyah->tmpt_lahir_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Alamat Ayaha</td>
            <td>
              {{{$pendaftaran_aliyah->alamat_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Pekerjaan Ayah</td>
            <td>
              {{{$pendaftaran_aliyah->pekerjaan_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Penghasilan Ayah</td>
            <td>
              {{{$pendaftaran_aliyah->penghasilan_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Pendidikan Ayah</td>
            <td>
              {{{$pendaftaran_aliyah->pendidikan_ayah}}}
            </td>
          </tr>

          <tr>
            <td>No Hp Ayah</td>
            <td>
              {{{$pendaftaran_aliyah->no_tlp_ayah}}}
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('pendaftaran_aliyah/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection