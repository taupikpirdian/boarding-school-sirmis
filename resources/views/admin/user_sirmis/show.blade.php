@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Users
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('user_sirmis/index')}}">List Users</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Nama</td>
            <td>
              {!! $user_sirmis->name !!}
            </td>
          </tr>

          <tr>
            <td>Email</td>
            <td>
              {!! $user_sirmis->email !!}
            </td>
          </tr>

          <tr>
            <td>Password</td>
            <td>
              {!! $user_sirmis->password !!}
            </td>
          </tr>

          <tr>
            <td>Photo</td>
            <td> <img style="width:30%" src="{{URL::asset('assets/images/'.$user_sirmis->photo)}}" > 
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('user_sirmis/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection