@extends('style.index')
@section('content')
<section id="breedcrumb">
  <div class="container">
    @if(Session::has('success'))
   <div class="alert alert-success">
     {{ Session::get('success') }}
   </div>
    @endif
	    <div class="row">
	        <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('blood-bank/home')}}">الرئيسية</a></li>
                      <li class="breadcrumb-item active " aria-current="page">تواصل معنا  </li>
                    </ol>
                </nav>
	        </div>
	    </div>
  <div class="row some-breathing-room">

    <div class="col-md-6">
        <div class="call-us-div shadow">
            <div class="div-bg"><p>اتصل بنا </p></div>
            <img class="logo-in-call" src="imgs/logo.png">
            <hr class="line">
            <ul class="list-call">
                <li>الجوال:01546655456</li>
                <li>فاكس :+24556646</li>
                <li>البريد الاكتروني :mazenfostir@gmail.com</li>
            </ul>
            <p class="call-us-head2">تواصل معنا</p>
            <div class="social-icons">
                    <i class="fab fa-facebook-square hvr-forward"></i>
                    <i class="fab fa-twitter-square hvr-forward"></i>
                    <i class="fab fa-youtube-square hvr-forward"></i>
                    <i class="fab fa-google-plus-square hvr-forward"></i>
                    <i class="fab fa-whatsapp-square hvr-forward"></i>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="call-us-div shadow">
        <div class="div-bg"><p>اتصل بنا </p></div>
        {!!Form::open(['action'=>'Front\StyleController@contactUsPost'])!!}
            <div class="form-group some-space">
                {!! Form::text('name', old('name'), ['class'=>'form-control', 'id'=>'exampleInputEmail1', 'aria-describedby'=>'emailHelp', 'placeholder'=>'الاسم']) !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>

            <div class="form-group some-space">
            {!! Form::text('email', old('email'), ['class'=>'form-control', 'id'=>'exampleInputEmail1', 'aria-describedby'=>'emailHelp', 'placeholder'=>'البريد الاكتروني']) !!}
            <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>

            <div class="form-group some-space">
            {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'id'=>'exampleInputEmail1', 'aria-describedby'=>'emailHelp', 'placeholder'=>'الجوال']) !!}
            <span class="text-danger">{{ $errors->first('phone') }}</span>
            </div>

            <div class="form-group some-space">
            {!! Form::text('subject', old('subject'), ['class'=>'form-control', 'id'=>'exampleInputEmail1', 'aria-describedby'=>'emailHelp', 'placeholder'=>'عنوان الرساله']) !!}
            <span class="text-danger">{{ $errors->first('subject') }}</span>
            </div>

            <div class="form-group">
            {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'id'=>'exampleFormControlTextarea1','raw'=>'3', 'placeholder'=>'نص الرساله']) !!}
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <button type="submit" class="btn btn-send-call hvr-float">ارسال</button>
            {!!Form::close()!!}


    </div>

        </div>


      </div>
  </div>
</section>
@endsection
