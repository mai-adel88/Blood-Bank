@extends('admin.index')
@inject('model', 'App\Role')
@inject('perm', 'App\Permission')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<!--Validation errors-->
		@include('admin.layouts.messages')
	
    	{!! Form::model($records, ['action' => ['Admin\RoleController@update'
    					,$records->id], 'method'=>'PUT' ]) !!}
	    	<div class="form-group">
	    		<label for="name">Name</label>
	    		{!!Form::text('name', null, ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	    		<label for="display_name">Dispaly Name</label>
	    		{!!Form::text('name', null, ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	    		<label for="description">Description</label>
	    		{!!Form::textarea('name', null, ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	    		<label for="permission_list">Permissions</label>
	    		<br>
	    		<input id="select-all" type="checkbox"><label for="select-all">Select All</label>
	    		<br>
	    		<div class="row">
	    			@foreach($perm->all() as $permission)
	    			<div class="col-sm-3">
	    				<div class="checkbox">
	    					<label>
	    						<input type="checkbox" name="permission_list[]" value="{{$permission->id}}"
	    							@if($records->hasPermission($permission->name))
	    								checked
	    							@endif
	    						>
	    						{{$permission->display_name}}
	    					</label>
	    				</div>
	    			</div>
	    			@endforeach
	    		</div>
	    	</div>

	    	<div class="form-group">
	    		<button class="btn btn-primary" type="submit">Update</button>
	    	</div>

		{!! Form::close() !!}
    </section>
</div>	
@push('scripts')
	<script>
		$("#select-all").click(function(){
			$("input[type=checkbox]").prop('checked', $(this).prop('checked'));
		});
	</script>
@endpush
@endsection