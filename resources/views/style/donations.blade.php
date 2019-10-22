@extends('style.index')
@section('content')
 @inject('blood_types','App\BloodType')
  @inject('cities','App\City')
<section id="breedcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('blood-bank/home')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                          </ol>
                </nav>

            </div>
        </div>
   </div>

<h2 class="donations-head horizntal-line">طلبات التبرع </h2>

 <!-- Donations offers  -->
<section id="donations">
<div class="container custom-position">
{!!Form::open(['action'=>'Front\StyleController@donationSearch','method' => 'get'])!!}
<div class="row  dropdown">

<div class="col-md-5">
   {{--  <select class="custom-select" name="blood_type_id">
        <option selected>اختر فصيلة الدم </option>
        @foreach($donations as $donate)
            <option value="{{$donate->bloodType->id}}">{{$donate->bloodType->type}}</option>
        @endforeach --}}
      {{-- </select> --}}

      {!! Form::select('blood_type_id', $blood_types->pluck('type', 'id')->toArray(),null,[
            'class' => 'form-control custom-select',
            'placeholder' => 'اختر فصيلة'
        ]) !!}
</div>

<div class="col-md-5">
    {!! Form::select('city_id', $cities->pluck('name', 'id')->toArray(),null,[
        'class' => 'form-control custom-select',
        'placeholder' => 'اختر المدينة'
        ]) !!}
</div>

<div class="col-md-2 search">
    <button class="circle search-icon"><i class="fas fa-search search-icon"></i></button>
</div>
</div>
{!!Form::close()!!}
@foreach($donations as $donation)
<div class="row background-div ">
<div class="col-lg-2">
<div class="blood-type border-circle">
<div class="blood-txt">
  {{optional($donation->bloodType)->type}}
</div>

</div>
</div>
<div class="col-lg-7">
<ul class="order-details">
  <li class="cutom-display">اسم الحاله: <span class="cutom-display">{{$donation->full_name}}</span></li> <br>

  <li class="cutom-display custom-padding" >  مستشفي: <span class="cutom-display custom-padding">{{$donation->hospital_name}}</span> </li><br>

  <div class="adjust-position"><li class="cutom-display ">  المدينة: <span class="cutom-display ">{{optional($donation->city)->name}}</span></li>
    </div>


</ul>

</div>
<div class="col-lg-3">
    <a href="{{url('blood-bank/donation-details', $donation->id)}}"><button class="btn more2-btn">التفاصيل </button></a>
</div>

</div>
</div>
@endforeach

</section>
{{$donations->render()}}
@endsection
