@extends('admin.index')
@inject('model', 'App\DonationRequest')
@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<!--Validation errors-->
		@include('admin.layouts.messages')
	
    	{!! Form::model($model, ['action' => 'Admin\DonationController@store']) !!}
	    	<div class="form-group">
	    		{!!Form::label('full_name', 'full name')!!}
	    		{!!Form::text('full_name', null, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		{!!Form::label('phone', 'phone')!!}
	    		{!!Form::text('phone', null, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		{!!Form::label('age', 'age')!!}
	    		{!!Form::text('age', null, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		{!!Form::label('hospital_name', 'hospital name')!!}
	    		{!!Form::text('hospital_name', null, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		<label for="hospital_address">hospital address</label>
	    		{!!Form::text('hospital_address', null, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		<label for="num_of_bag">number of bags</label>
	    		{!!Form::text('num_of_bag', null, ['class'=>'form-control'])!!}
	    	</div>
	    	<div class="form-group">
	    		<label for="notes">notes</label>
	    		{!!Form::textarea('notes', null, ['class'=>'form-control'])!!}
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
	    		<button class="btn btn-primary" type="submit">Add</button>
	    	</div>
		{!! Form::close() !!}
    </section>
</div>	
@endsection