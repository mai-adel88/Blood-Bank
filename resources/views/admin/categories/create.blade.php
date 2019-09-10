@extends('admin.index')
@inject('model', 'App\Category')
@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<!--Validation errors-->
		@include('admin.layouts.messages')
	
    	{!! Form::model($model, ['action' => 'Admin\CategoriesController@store']) !!}
	    	<div class="form-group">
	    		<label for="name">Name</label>
	    		{!!Form::text('name', null, ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	    		<button class="btn btn-primary" type="submit">Add</button>
	    	</div>
		{!! Form::close() !!}
    </section>
</div>	
@endsection