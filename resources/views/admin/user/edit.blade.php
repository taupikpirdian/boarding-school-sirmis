@extends('admin.admin')
@section('content')
<div class="col-lg-6">
	{!! Form::model($user,['method'=>'put', 'files'=> 'true', 'action'=>['admin\UserController@update',$user->id]]) !!}
	        {{ csrf_field() }}
	    <div class="element-wrapper">
	      <h6 class="element-header">
	        
	      </h6>
	      <div class="element-box">
	        <form>
	          <h6 class="form-header">
	           EDIT USER
	          </h6>
	          <div class="form-group">
	            <label for=""> Nama</label>
	            <input class="form-control" placeholder="Masukan Nama" name="name" value="{{{$user->name}}}">
	          </div>
	          <div class="form-group">
	            <label for=""> Email</label>
	            <input class="form-control" placeholder="Masukan Email" name="email" value="{{{$user->email}}}">
	          </div>
	          <div class="form-group">
	            <label for=""> Akses</label>
				<div class="help-block form-text with-errors form-control-feedback">
                <select name="user_group_id" class="form-control">
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_group_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_status_id') }}</strong>
                    </span>
                @endif
            </div>
               <!--  <div class="form-group">
	            <label for=""> Status User</label>
	            <input class="form-control" name="user_status_id" value="{{{$user->user_status_id}}}">
	          </div> -->
	          </div>
	          <div class="form-buttons-w">
	            <button class="button button-primary" type="submit"> Submit</button>
	          </div>
	        </form>
	      </div>
	    </div>
	{!! Form::close() !!}  
</div>
@endsection