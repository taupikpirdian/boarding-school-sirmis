@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Pendaftaran Tsanawiyah
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('pendaftaran_tsanawiyah/index')}}">List Pendaftaran Tsanawiyah</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>id</td>
            <td>
              {{{$pendaftaran_tsanawiyah->id}}}
            </td>
          </tr>

          <tr>
            <td>Nama Lengkap</td>
            <td>
              {{{$pendaftaran_tsanawiyah->nm_lengkap}}}
            </td>
          </tr>

          <tr>
            <td>Tempat Lahir</td>
            <td>
              {{{$pendaftaran_tsanawiyah->tempat_lahir}}}
            </td>
          </tr>

          <tr>
            <td>Tanggal Lahir</td>
            <td>
              {{{$pendaftaran_tsanawiyah->tanggal_lahir}}}
            </td>
          </tr>

          <tr>
            <td>Alamat Siswa</td>
            <td>
              {{{$pendaftaran_tsanawiyah->alamat_siswa}}}
            </td>
          </tr>

          <tr>
            <td>Jenis Kelamin</td>
            <td>
              {{{$pendaftaran_tsanawiyah->jk}}}
            </td>
          </tr>

          <tr>
            <td>No Hp Siswa</td>
            <td>
              {{{$pendaftaran_tsanawiyah->no_tlp}}}
            </td>
          </tr>

          <tr>
            <td>Ukuran Seragam</td>
            <td>
              {{{$pendaftaran_tsanawiyah->ukuran_seragam}}}
            </td>
          </tr>

          <tr>
            <td>Pesantren</td>
            <td>
              {{{$pendaftaran_tsanawiyah->pesantren}}}
            </td>
          </tr>

          <tr>
            <td>Photo</td>
            <td> <img style="width:300px" src="{{URL::asset('images/pendaftaran/tsanawiyah/thumbs/'.$pendaftaran_tsanawiyah->photo)}}" > 
            </td>
          </tr>

          <tr>
            <td>Nama Ibu</td>
            <td>
              {{{$pendaftaran_tsanawiyah->nama_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Tempat Lahir Ibu</td>
            <td>
              {{{$pendaftaran_tsanawiyah->tmpt_lahir_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Alamat Ibu</td>
            <td>
              {{{$pendaftaran_tsanawiyah->alamat_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Pekerjaan Ibu</td>
            <td>
              {{{$pendaftaran_tsanawiyah->pekerjaan_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Penghasilan Ibu</td>
            <td>
              {{{$pendaftaran_tsanawiyah->penghasilan_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Pendidikan Ibu</td>
            <td>
              {{{$pendaftaran_tsanawiyah->pendidikan_ibu}}}
            </td>
          </tr>

          <tr>
            <td>No Hp Ibu</td>
            <td>
              {{{$pendaftaran_tsanawiyah->no_tlp_ibu}}}
            </td>
          </tr>

          <tr>
            <td>Nama Ayah</td>
            <td>
              {{{$pendaftaran_tsanawiyah->nama_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Tempat Lahir Ayah</td>
            <td>
              {{{$pendaftaran_tsanawiyah->tmpt_lahir_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Alamat Ayaha</td>
            <td>
              {{{$pendaftaran_tsanawiyah->alamat_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Pekerjaan Ayah</td>
            <td>
              {{{$pendaftaran_tsanawiyah->pekerjaan_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Penghasilan Ayah</td>
            <td>
              {{{$pendaftaran_tsanawiyah->penghasilan_ayah}}}
            </td>
          </tr>

          <tr>
            <td>Pendidikan Ayah</td>
            <td>
              {{{$pendaftaran_tsanawiyah->pendidikan_ayah}}}
            </td>
          </tr>

          <tr>
            <td>No Hp Ayah</td>
            <td>
              {{{$pendaftaran_tsanawiyah->no_tlp_ayah}}}
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('pendaftaran_tsanawiyah/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection