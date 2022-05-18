@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Pimpinan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('kategori_pimpinan/index')}}">List Kategori Pimpinan</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Kategori Pimpinan</td>
            <td>
              {{{$kategori_pimpinan->kategori_pimpinan}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('kategori_pimpinan/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection