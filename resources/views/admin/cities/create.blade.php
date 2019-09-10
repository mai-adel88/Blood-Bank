@extends('admin.index')
@inject('model', 'App\City')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<!--Validation errors-->
		@include('admin.layouts.messages')
	
    	{!! Form::model($model, ['action' => 'Admin\CitiesController@store']) !!}
	    	<div class="form-group">
	    		<label for="name">City Name</label>
	    		{!!Form::text('name', null, ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	        	{!!  Form::label('governorate_id', 'Governorate Name')!!}
	        	<select name="governorate_id" class="form-control">
	        		
	        	@foreach($governorates as $governorate)
	        		<option value="{{$governorate->id}}">{{$governorate->name}}</option>
	        	@endforeach
	        	</select>
	        </div>

	    	<div class="form-group">
	    		<button class="btn btn-primary" type="submit">Add</button>
	    	</div>
		{!! Form::close() !!}
    </section>
</div>	
@endsection