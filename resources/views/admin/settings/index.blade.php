@extends('admin.index')
@inject('client', 'App\Client')
@inject('model', 'App\Governorate')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
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
    			<thead>
    				<tr>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Youtube</th>
                        <th>Instagram</th>
                        <th>Whatsapp</th>
                        <th>About App</th>
        				<th>Edit</th>
        				
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($records as $record)

    					<tr>
                            <td>{{$record->phone}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->logo}}</td>
                            <td>{{$record->facebook_social}}</td>
                            <td>{{$record->twitter_social}}</td>
                            <td>{{$record->youtube}}</td>
                            <td>{{$record->instagram}}</td>
                            <td>{{$record->whatsapp}}</td>
                            <td>{{$record->about_app}}</td>
                            
            				<td>
                                <a href="{{url(route('settings.edit', $record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>            
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