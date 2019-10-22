@extends('style.index')
@section('content')

<section id="breedcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('blood-bank/home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">من نحن </li>
                    </ol>
                </nav>

            </div>

            <div class="col-md-12">
                <div class="who-are-we shadow">
                    <img class="we-logo" src="imgs/logo.png">
                    <p class="who-text">{{$settings->about_app}}</p>

                </div>
            </div>
        </div>
        </div>

@endsection
