@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Role
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('group-roles')}}">List Role</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
            <td>Group</td>
            <td>
              {{{$group_role->group->name}}}
            </td>
          </tr>

          <tr>
            <td>Group Role</td>
            <td>
              {{{$group_role->role->name}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('group-roles')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection