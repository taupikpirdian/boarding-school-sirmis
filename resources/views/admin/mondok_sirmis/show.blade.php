@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Mondok
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('mondok_sirmis/index')}}">List Mondok</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Mondok</td>
            <td>
              {{{$mondok_sirmis->name}}}
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('mondok_sirmis/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection