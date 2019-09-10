@extends('admin.index')
@inject('model', 'App\User')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Change Password
	      </h1>
	      <br>
	      <ol class="breadcrumb">
	        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	      </ol>
	    </section>
	    <div class="container">
			<div class="raw">
		
			    <div class="col-md-6">
			    @include('admin.layouts.messages')
				
			    	{!! Form::model($model, ['action' => 'Admin\UserController@changePasswordSave']) !!}
				    	
				    	<div class="form-group">
				    		<label for="old-password">Old Password</label>
				    		{!!Form::text('old-password', null, ['class'=>'form-control'])!!}
				    	</div>
				    	<div class="form-group">
				    		<label for="password">Password</label>
				    		{!!Form::text('password', null, ['class'=>'form-control'])!!}
				    	</div>

				    	<div class="form-group">
				    		<button class="btn btn-primary" type="submit">Save</button>
				    	</div>
			    	{!!Form::close()!!}

				</div>
			</div>
	</div>
</div>

@endsection