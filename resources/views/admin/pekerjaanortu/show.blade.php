@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Pekerjaan Orang Tua
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('pekerjaan_ortu/index')}}">List Pekerjaan Orang Tua</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Pekerjaan Orang Tua</td>
            <td>
              {{{$pekerjaan_ortu->pekerjaan_ortu}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('pekerjaan_ortu/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection