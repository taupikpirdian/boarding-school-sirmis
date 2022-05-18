@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Pendidikan Orangtua
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('pendidikan_ortu/index')}}">List Pendidikan Orangtua</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Pendidikan Orangtua</td>
            <td>
              {{{$pendidikan_ortu->pendidikan_ortu}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('pendidikan_ortu/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection