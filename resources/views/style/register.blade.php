@extends('style.index')
@section('page_title')
	<title>register</title>
@endsection
@section('content')

<section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{url('blood-bank/home')}}">الرئيسية</a></li>
                              <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row">
        <div class="col-md-12 signup-form">
            {!!Form::open( ['action' => 'Front\AuthController@registerSave', 'class'=>'needs-validation'])!!}


                <div class="form-row">
                    {!! Form::text('name', old('name'),['class'=>'form-control', 'id'=>'validationCustom01', 'placeholder'=>'الاسم']) !!}


                    <div class="invalid-feedback">
                        Please provide a valid name.
                    </div>
                </div>

                <div class="form-row">
                    {!! Form::email('email', old('email'), ['class'=>'form-control', 'id'=>'validationCustom02', 'placeholder'=>'البريد الالكتروني']) !!}


                    <div class="invalid-feedback">
                        Please provide a valid name.
                    </div>
                </div>

                <div class="form-row">
                    {!! Form::text('password', old('password'), ['class'=>'form-control', 'id'=>'validationCustom02', 'placeholder'=>'الرقم السري']) !!}

                </div>

                <div class="form-row">
                    {!! Form::date('d_o_b', old('d_o_b'),['class'=>'form-control', 'id'=>'BD', 'id'=>'validationCustom03','placeholder'=>'تاريخ الميلاد']) !!}
                    <span class="calendar-btn" onclick="pureJSCalendar.open('dd/MM/yyyy',-10, -10, 1, '1800-5-5', '2019-8-20', 'BD', 20)"  >
                        <i class="fas fa-calendar-alt first-icon"></i>
                        <div id="my-calendar"></div>
                    </span>
                </div>

                <div class="form-row">
                    @inject('blood_types', 'App\BloodType')
                    {!! Form::select('blood_type_id', $blood_types->pluck('type', 'id')->toArray(), null, ['class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width', 'id'=>'validationCustom04', 'placeholder'=>'فصيلة الدم']) !!}


                    <div class="invalid-feedback">
                        Please provide a valid name.
                    </div>
                </div>


                <div class="form-row">
                    @inject('governorate', 'App\Governorate')
                    {!! Form::select('governorate_id', $governorate->pluck('name', 'id')->toArray(), null,[
                        'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',
                        'id'   =>'govenorates',
                        'placeholder'=>'اختر المحافظة'
                      ]) !!}
                </div>
                <div class="form-row">
                    {!! Form::select('city_id', [], null,[
                      'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',
                      'id'   =>'cities',
                      'placeholder'=>'اختر مدينة'
                    ]) !!}
                </div>

                    <div class="form-row">
                    {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'id'=>'validationCustom05', 'placeholder'=>'رقم الهاتف']) !!}


                    <div class="invalid-feedback">
                      Please provide a valid phone number .
                    </div>
                    </div>

                    <div class="form-row">
                    {!! Form::date('last_donation_date', old('last_donation_date'), ['class'=>'form-control', 'id'=>'validationCustom03', 'placeholder'=>'آخر تاريخ تبرع']) !!}


                    <span class="calendar-btn" onclick="pureJSCalendar.open('dd/MM/yyyy',-10, -10, 1, '1800-5-5', '2019-8-20', 'ddd', 20)"  >
                        <i class="fas fa-calendar-alt second-icon"></i>
                        <div id="my-calendar"></div>
                      </span>
                    </div>

                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                          Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                          You must agree before submitting.
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-create shadow" type="submit">انــشاء  </button>
                {!!Form::close()!!}
            </div>

              <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
              </script>
            }

        </div>

          </div>
      </div>
</section>

@push('scripts')
<script>
  $("#govenorates").change(function(e){
    e.preventDefault(); //to not submit form

    //get governorates
    var governorate_id = $("#govenorates").val();

    //send ajax
    if(governorate_id){
        $.ajax({
            url : "{{url('api/v1/cities?governorate_id=')}}"+governorate_id,
            type : 'get',   //type url  in api
            success : function(data){ //data for response Status, Data, Message
                if(data.Status == 1){
                    $("#cities").empty();
                    $("#cities").append('<option value="">اختر مدينة</option>');//append cites
                    //jquery foreach
                    $.each(data.Data, function(index, city){
                        $("#cities").append('<option value="'+city.id+'">'+city.name+'</option>');
                    });
                }
                else{console.log('rrr');}
            }
        });
    }else{
        //if not governorates chosen
        $("#cities").empty();
        $("#cities").append('<option value="">اختر مدينة</option>');
    }

  });

</script>
@endpush
@endsection
