@extends('admin.index')
@inject('record', 'App\DonationRequest')
@section('content')


<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Donation Requests
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>

    </section>

        
        <div class="panel panel-default">
            <section class="content">
            	<p><a href="{{url('admin/donation/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Donation Request</a></p>
                
                    @include('flash::message')
                    @foreach($records as $record)
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <div class="info-box">
                        <span class="info-box-icon bg-red" style="border-radius: 50px;">{{$record->bloodType->type}}</span>

                        <div class="info-box-content">
                          <div style="color: black;height: 58px;width: 230px;font-size:20px;">
                            <p><b>Governorate: </b>{{optional($record->city->governorate)->name}}</p>
                            <p><b>City: </b>{{optional($record->city)->name}}</p>
                          </div>
                          
                            
                            <button class="btn btn-primary" style="right: 786px;margin-top: 7px;"><a href="{{url(route('donation.show',$record->id))}}" style="color: #fff;">
                              Details
                            </a></button>
                            

                            {!!Form::open([ 'route'=>['donation.destroy', $record->id]            ,'method'=>'delete'] )!!}
                            <div class="form-group">
                                <button class="btn btn-danger btn-s" type="submit" style="right: 220px;top: 70px;position: absolute;"><i class="fa fa-trash-o"></i>Delete</button>
                            </div>
                            {!!Form::close()!!}
                            
                        </div>
                        
                      </div>
                    </div>
                    @endforeach   
             
            </section>
        </div>
        
  </div>

@endsection