@extends('admin.index')
@section('content')

<div class="content-wrapper">
	<div class="container">
    		<div class="raw">
    			<div class="col-md-8">
    <!-- Content Header (Page header) -->
				    <section class="content-header">
				    	<h2>Edit Post</h2>
				    	<!--Validation errors-->
						@include('admin.layouts.messages')
					
				    	{!! Form::model($records, ['action' => ['Admin\PostsController@update'
				    					,$records->id , 'files'=> true], 'method'=>'PUT' ]) !!}
					    	<div class="form-group">
					    		{!!Form::label('title', 'Title')!!}
					    		{!!Form::text('titl', $records->title, ['class'=>'form-control'])!!}
					    	</div>

					    	<div class="form-group">
					    		{!!Form::label('content', 'Content')!!}
					    		{!!Form::textarea('content', $records->content, ['class'=>'form-control'])!!}
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
					    		<img src="{{asset($records->image)}}" style="width: 80px;" >
					    	</div>

					    	<div class="form-group">
					    		<button class="btn btn-primary" type="submit">Update</button>
					    	</div>
						{!! Form::close() !!}
				    </section>
			    </div>
		    </div>
	    </div>
</div>	
@endsection