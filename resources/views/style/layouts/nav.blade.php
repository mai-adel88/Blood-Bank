 <!-- top nav section -->
    <section id="top-nav">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
              <div class="lang">
                  <span><a href="{{ url('locale/ar') }}" style="color: #fff;" id="arabic">عربى</a></span>
                  <span><a href="{{ url('locale/en') }}" style="color: #fff;" id="en">EN</a></span>
                </div>
          </div>
          <div class="col-md-4">
           <div class="social-media">
              <a href="{{$settings->facebook_social}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a href="{{$settings->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
              <a href="{{$settings->twitter_social}}" target="_blank"><i class="fab fa-twitter"></i></a>
              <a href="{{$settings->whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a>

           </div>

          </div>
          <div class="col-md-4">
              <div class="contact">

                  <p class="email"> {{$settings->email}}</p>

                  <i class="fas fa-envelope-square email "></i>
                  <p class="phone "> {{$settings->phone}}
                    </p>
                    <i class="fas fa-phone-volume phone hvr-buzz"></i>
                </div>

            </div>
        </div>

      </div>
    </section>
     <!-- oradaniry nav section -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="nav-logo " href="{{url('blood-bank/home')}}"><img class="logo" src="{{asset('blood-bank/imgs/logo.png')}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">

              <a class="nav-link " href="{{url('blood-bank/home')}}">{{trans('sentence.home')}}</a>
              <span class="test"></span>



            </li>
            <li class="nav-item">
              <a class="nav-link border-left" href="#">{{trans('sentence.about')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link border-left" href="{{url('blood-bank/posts')}}">{{trans('sentence.posts')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-left" href="{{url('blood-bank/donation')}}">{{trans('sentence.donation-requests')}}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link border-left" href="{{url('blood-bank/who-we-are')}}">{{trans('sentence.who-we-are')}}</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link border-left" href="{{url('blood-bank/contact')}}">{{trans('sentence.contact-us')}}</a>
                  </li>
          </ul>
            @if (auth('client-web')->guest())
                <span class="navbar-text">
                   <a  class="new-account"href="{{url('blood-bank/register')}}">{{trans('sentence.create-new-account')}}</a>
                   <a href="{{url('blood-bank/login')}}"><button class="btn login-btn shadow">{{trans('sentence.login')}}</button></a>
                </span>
            @else
                <div style="background-color: #2D3E50; border: none; padding: 8px;
                            width: 90px;border: 2px solid #2d3e50;
                            border-radius: 7px;text-align: center; color: #fff">
                            {{ auth('client-web')->user()->name }}
                </div>
            @endif

        </div>
      </nav>
