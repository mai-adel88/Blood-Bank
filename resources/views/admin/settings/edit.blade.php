@extends('admin.index')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
    	<div class="container">
    		<div class="raw">
    			<div class="col-md-6">
    			<!--Validation errors-->
    				<h2>Edit Settings</h2>
    				
					@include('admin.layouts.messages')
					<br>
	
			    	{!! Form::model($record, [ 'action' => ['Admin\SettingsController@update', $record->id],'method'=>'post']) !!}

				    	<div class="form-group">
				    		<label for="phone">phone</label>
				    		{!!Form::text('phone', $record->phone, ['class'=>'form-control'])!!}
				    	</div>
				    	<div class="form-group">
				    		<label for="email">email</label>
				    		{!!Form::email('email', $record->email, ['class'=>'form-control'])!!}
				    	</div>
				    	<div class="form-group">
				    		<label for="facebook_social">facebook</label>
				    		{!!Form::text('facebook_social', $record->facebook_social, ['class'=>'form-control'])!!}
				    	</div> 
				    	<div class="form-group">
				    		<label for="twitter_social">twitter</label>
				    		{!!Form::text('twitter_social', $record->twitter_social, ['class'=>'form-control'])!!}
				    	</div>
				    	<div class="form-group">
				    		<label for="youtube">youtube</label>
				    		{!!Form::text('youtube', $record->youtube, ['class'=>'form-control'])!!}
				    	</div>
				    	<div class="form-group">
				    		<label for="instagram">instagram</label>
				    		{!!Form::text('instagram', $record->instagram, ['class'=>'form-control'])!!}
				    	</div>
				    	<div class="form-group">
				    		<label for="whatsapp">whatsapp</label>
				    		{!!Form::text('whatsapp', $record->whatsapp, ['class'=>'form-control'])!!}
				    	</div>
				    	<div class="form-group">
				    		<label for="about_app">about app</label>
				    		{!!Form::textarea('about_app', $record->about_app, ['class'=>'form-control'])!!}
				    	</div>
				    	<div class="form-group">
				    		<label for="logo">Logo</label>
				    		{!!Form::file('logo', ['class'=>'form-control'])!!}
				    	</div>

				    	<div class="form-group">
				    		<button class="btn btn-primary" type="submit">Update</button>
				    	</div>
					{!! Form::close() !!}
				</div>
    		</div>
    	</div>
    	
    </section>
</div>	
@endsection