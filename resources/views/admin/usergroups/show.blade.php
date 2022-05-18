@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      User Groups
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('user-groups')}}">List User Groups</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
            <td>User</td>
            <td>
              {{{$user_group->user->name}}}
            </td>
          </tr>

          <tr>
            <td>Group</td>
            <td>
              {{{$user_group->group->name}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('user-groups')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection