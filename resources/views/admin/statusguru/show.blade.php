@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Struktur Guru
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('status_guru/index')}}">List Struktur GUru</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Status Guru</td>
            <td>
              {{{$status_guru->status_guru}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('status_guru/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection