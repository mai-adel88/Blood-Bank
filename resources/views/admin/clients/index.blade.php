@extends('admin.index')
@inject('model', 'App\Client')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clients
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
                        <th>City</th>
                        <th>Governorate</th>
                        <th>Date Of Birth</th>
                        <th>Blood Type</th>
                        <th>Last Donation</th>
                        <th>Is Active</th>
        				<th>Delete</th>
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($records as $record)

    					<tr style="text-align: center;">
            				<td>{{$loop->iteration}}</td>
            				<td>{{$record->name}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->phone}}</td>
                            <td>{{optional($record->city)->name}}</td>
                            <td>{{$record->city ? optional($record->city->governorate)->name : ''}}</td>
                            <td>{{$record->d_o_b}}</td>
                            <td>{{$record->bloodType->type}}</td>
                            <td>{{$record->last_donation_date}}</td>

                            <td>
                                @if($record->is_active)
                                        <a href="clients/{{$record->id}}/de-active" class="btn btn-xs btn-danger"><i class="fa fa-close"></i> إيقاف</a>
                                    @else
                                        <a href="clients/{{$record->id}}/active" class="btn btn-xs btn-success"><i class="fa fa-check"></i> تفعيل</a>
                                @endif
                                
                            </td>

            				<td>
                                {!!Form::open([ 'route'=>['clients.destroy', $record->id],'method'=>'delete'] )!!}
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