@extends('admin.index')
@inject('map', 'App\DonationRequest')
@section('content')


<div class="content-wrapper">
	<div class="container">
    		<div class="raw">
    			<div class="col-md-4">
    			<br>	
				<div class="Panel with panel-info class" style="width: 70%;border: 3px #374850;background-color:#374850;color: #ECF0F5; padding: 10px;font-size: 20px;">
				
					<div class="panel-heading">Blood Type {{$records->bloodType->type}}</div>
					<div class="Panel with panel-default class">
						<p>Name: {{$records->full_name}}</p>
						<p>Age: {{$records->age}}</p>
						<p>Phone: {{$records->phone}}</p>
						<p>Bags: {{$records->num_of_bag}}</p>
						<p>Hospital Name: {{$records->hospital_name}}</p>
						<p>Hospital Address: {{$records->hospital_address}}</p>
						

						{!!Form::open([ 'route'=>['donation.destroy', $records->id]            ,'method'=>'delete'] )!!}
                            <div class="form-group">
                                <button class="btn btn-danger btn-s" type="submit"><i class="fa fa-trash-o"></i></button>
                            </div>
                        {!!Form::close()!!}
					</div>
				</div>
                
            	</div>
            	<div class="col-md-8">
            		<div style="height: 400px;width: 400px;">
            			{!!Mapper::render()!!}
            			{!!Mapper::renderJavascript()!!}
            		</div>
            	</div>
		</div>
	</div>

</div>

@endsection