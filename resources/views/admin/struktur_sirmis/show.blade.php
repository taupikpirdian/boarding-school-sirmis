@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Struktur Pesantren
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('struktur_sirmis/index')}}">List Struktur Pesantren</a></li>
      </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Struktur</td>
            <td>
              {!! $struktur_sirmis->isi !!}
            </td>
          </tr>

          </table>
        <p align="center">
          <a href="{{URL::to('struktur_sirmis/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection