@extends('style.index')
@section('content')
<section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('blood-bank/home')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول </li>
                  </ol>
                </nav>

              </div>
          </div>
          <div class="row">
        <div class="col-md-12">
            <div class="article-content shadow">
                <p class="content">
                    <img  class="log-logo" src="{{asset('blood-bank/imgs/logo.png')}}">
                    @inject('client', 'App\Client')
                    {!!Form::open(['action'=>'Front\AuthController@doLogin' , 'method'=>'post'])!!}
                            <div class="form-group">
                                {{Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'الجوال'])}}
                            </div>
                            <div class="form-group">
                                {{Form::password('password', old('password'), ['class'=>'form-control', 'placeholder'=>'كلمة المرور'])}}
                            </div>
                            <div class="form-check ">
                              <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                {!! Form::checkbox('remember_token',1,false) !!}
                                {!! Form::label('remember_token', 'تذكرني') !!}
                              </div>


                            </div>
                            <div class="did-u-forget clearfix">
                              <a class="forget-pass" href="#"><p class="forget ">هل نسيت كلمة المرور</p></a>
                              <img class="complian forget"src="{{asset('blood-bank/imgs/complain.png')}}">

                             </div>
                            <div class="form-btns">
                            <button type="submit" class="btn btn-login">دخول </button>
                            <button type="submit" class="btn btn-new" ><a style="color: #fff;" href="{{url('blood-bank/register')}}">انشاء حساب جديد </a></button>
                        </div>
                        {!!Form::close()!!}

            </div>

        </div>

          </div>
      </div>
</section>
@endsection
