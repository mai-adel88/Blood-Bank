@extends('admin.index')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contacts
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	
        @include('flash::message')
    	<div class="table-responsive">
    		<table class="table table-borderd table-striped table-hover">
    			<thead style="text-align: center;">
    				<tr>
        				<th>#</th>
        				<th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
        				<th>Delete</th>
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($records as $record)

    					<tr>
            				<td>{{$loop->iteration}}</td>
            				<td>{{$record->name}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->phone}}</td>
                            <td>{{$record->subject}}</td>
                            <td>{{$record->message}}</td>

            				<td>
                                {!!Form::open([ 'route'=>['contacts.destroy', $record->id],'method'=>'delete'] )!!}
                                <div class="form-group">
                                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button>
                                </div>
                                {!!Form::close()!!}                
                            </td>
    					</tr>
    				@empty
    				<tr>
    					<td colspan="4">
    						<div class="alert alert-danger">no data</div>

    					</td>
    				</tr>
					@endforelse
    					
    			</tbody>
    			
    		</table>
    	</div>
        	     

    </section>
    <!-- /.content -->
  </div>

@endsection