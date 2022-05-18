@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Ukuran Seragam
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('ukuran_seragam/index')}}">List Ukuran Seragam</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Ukuran Seragam</td>
            <td>
              {{{$ukuran_seragam->ukuran_seragam}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('ukuran_seragam/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection