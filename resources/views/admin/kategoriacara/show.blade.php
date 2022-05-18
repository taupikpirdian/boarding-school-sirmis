@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Kategori Acara
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('kategori_acara/index')}}">List Kategori Acara</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>Kategori Acara</td>
            <td>
              {{{$kategori_acara->kategori_acara}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('kategori_acara/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection