@extends('admin.index')
@inject('model', 'App\Category')
@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<!--Validation errors-->
		@include('admin.layouts.messages')
	
    	{!! Form::model($model, ['action' => 'Admin\PostsController@store', 'files'=> true]) !!}
	    	<div class="form-group">
	    		{!!Form::label('title', 'Title')!!}
	    		{!!Form::text('title', null, ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	    		{!!Form::label('content', 'Content')!!}
	    		{!!Form::textarea('content', null, ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	    		{!!Form::label('category_id', 'Category')!!}
	    		<select name="category_id" class="form-control">
				        		
		        	@foreach($categories as $category)
		        		<option value="{{$category->id}}">{{$category->name}}</option>
		        	@endforeach
	        	</select>
	    	</div>

	    	<div class="form-group">
	        	{!!  Form::label('user_id', 'Added:')!!}
	        	<select name="user_id" class="form-control">
	        		
	        	@foreach($users as $user)
	        		<option value="{{$user->id}}">{{$user->name}}</option>
	        	@endforeach
	        	</select>
	        </div>

	    	<div class="form-group">
	    		{!!Form::label('image', 'Image')!!}
	    		{!!Form::file('image', null, ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	    		<button class="btn btn-primary" type="submit">Add</button>
	    	</div>
		{!! Form::close() !!}
    </section>
</div>	
@endsection