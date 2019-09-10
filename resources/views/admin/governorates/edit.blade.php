@extends('admin.index')
@inject('model', 'App\Governorate')
@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<!--Validation errors-->
		@include('admin.layouts.messages')
	
    	{!! Form::model($records, [ 'action' => ['Admin\GovernorateController@update', $records->id],    'method'=>'PUT' ]) !!}
	    	<div class="form-group">
	    		<label for="name">Name</label>
	    		{!!Form::text('name', $records->name, ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	    		<button class="btn btn-primary" type="submit">Update</button>
	    	</div>
		{!! Form::close() !!}
    </section>
</div>	
@endsection