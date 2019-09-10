@extends('admin.index')
@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<!--Validation errors-->
		@include('admin.layouts.messages')
	
    	{!! Form::model($records, ['action' => ['Admin\AdminsController@update'
    					,$records->id], 'method'=>'PUT' ]) !!}
	    	<div class="form-group">
	    		{!!Form::label('full_name', 'full name')!!}
	    		{!!Form::text('full_name', $records->full_name, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		{!!Form::label('phone', 'phone')!!}
	    		{!!Form::text('phone', $records->phone, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		{!!Form::label('age', 'age')!!}
	    		{!!Form::text('age', $records->age, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		{!!Form::label('hospital_name', 'hospital name')!!}
	    		{!!Form::text('hospital_name', $records->hospital_name, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		<label for="hospital_address">hospital address</label>
	    		{!!Form::text('hospital_address', $records->hospital_address, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		<label for="num_of_bag">number of bags</label>
	    		{!!Form::text('num_of_bag', $records->num_of_bag, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		<label for="notes">notes</label>
	    		{!!Form::textarea('notes', $records->notes, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		<label>Governorate</label>
	    		<select name="city_id" class="form-control">
				        		
		        	@foreach($cities as $city)
		        		<option value="{{$city->governorate->id}}">{{$city->governorate->name}}</option>
		        	@endforeach
	        	</select>
	    	</div>
	    	<div class="form-group">
	    		<label for="city_id">city</label>
	    		<select name="city_id" class="form-control">
				        		
		        	@foreach($cities as $city)
		        		<option value="{{$city->id}}">{{$city->name}}</option>
		        	@endforeach
	        	</select>
	    	</div>
	    	<div class="form-group">
	    		<label for="blood_type_id">blood type</label>
	    		<select name="blood_type_id" class="form-control">
				        		
		        	@foreach($blood_types as $blood_type)
		        		<option value="{{$blood_type->id}}">{{$blood_type->type}}</option>
		        	@endforeach
	        	</select>
	    	</div>

	    	<div class="form-group">
	    		<button class="btn btn-primary" type="submit">Update</button>
	    	</div>
		{!! Form::close() !!}
    </section>
</div>	
@endsection