@extends('style.index')
@section('content')

<section id="breedcrumb" style="
      padding-bottom: 2rem;">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('blood-bank/home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{url('blood-bank/posts')}}">المقالات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طريقه الوقاية من الامراض </li>
                      </ol>
                    </nav>
              </div>
          </div>
        @foreach($posts as $post)
        <div class="row" >
        <div class="col-md-12">
        <img class="article-img shadow p-3 mb-5 " src="{{asset($post->image)}}">
        <div style="width: 784px; margin-right: 159px;">
            <div class="artilce-head">
                <p class="article-name">{{$post->title}}</p>
            </div>
            <div class="article-content shadow" style="margin: 15px;">
                <p class="content">{{$post->content}}</p>
                <img class="share-icon custom-position" src="{{asset('blood-bank/imgs/social-share-symbol.png')}}">
                <p class="custom-position2">شارك هذه المقاله :</p>
                <div class="social-share">
                  <a href="https://www.facebook.com/sharer/sharer.php?u={{'posts/'.$post->id}}&display=popup"><i class="fab fa-facebook-square"></i></a>
                  <i class="fab fa-twitter-square"></i>

                  <i class="fab fa-google-plus-square"></i>


                </div>

            </div>
        </div>

          </div>
          </div>
          <hr>
          @endforeach
          <div class="row">
            <div class="col-md-12">
              <section id="articles">
                <h1 class="articles-relative">{{ trans('sentence.related-articles') }}</h1>
                {{-- <h2 class="articles-relative">مقالات ذات صلة  </h2> --}}
                <div class="container custom" style="direction: ltr">
                  <div class="owl-carousel owl-theme" id="owl-articles">
                    <div class="item">
                      <div class="card" style="width: 22rem;">
                        <i onclick="toggleFavourite(this)"  class="fab fa-gratipay first-heart"></i>
                        <img class="card-img-top" src="{{asset('blood-bank/imgs/p1.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">طريقة الوقاية من الامراض </h5>
                          <p class="card-text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تر</p>
                          <a href="article.html"><button class="btn details-btn">التفاصيل </button></a>
                        </div>
                      </div>


                    </div>
                    <div class="item">
                      <div class="card" style="width: 22rem;">
                        <i onclick="toggleFavourite(this)"  class="fab fa-gratipay first-heart"></i>
                        <img class="card-img-top" src="{{asset('blood-bank/imgs/p2.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">طريقة الوقاية من الامراض </h5>
                          <p class="card-text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تر</p>
                          <a href="#"><button class="btn details-btn">التفاصيل </button></a>
                        </div>
                      </div>


                    </div>
                    <div class="item">

                      <div class="card" style="width: 22rem;">
                        <i onclick="toggleFavourite(this)"  class="fab fa-gratipay first-heart"></i>
                        <img class="card-img-top" src="{{asset('blood-bank/imgs/p1.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">طريقة الوقاية من الامراض </h5>
                          <p class="card-text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تر</p>
                          <a href="#"><button class="btn details-btn">التفاصيل </button></a>
                        </div>
                      </div>

                    </div>
                    <div class="item">
                      <div class="card" style="width: 22rem;">
                        <i onclick="toggleFavourite(this)"  class="fab fa-gratipay first-heart"></i>
                        <img class="card-img-top" src="{{asset('blood-bank/imgs/p1.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">طريقة الوقاية من الامراض </h5>
                          <p class="card-text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تر</p>
                          <a href="#"><button class="btn details-btn">التفاصيل </button></a>
                        </div>
                      </div>


                    </div>
                    <div class="item">
                      <div class="card" style="width: 22rem;">
                        <i onclick="toggleFavourite(this)"  class="fab fa-gratipay first-heart"></i>
                        <img class="card-img-top" src="{{asset('blood-bank/imgs/p1.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">طريقة الوقاية من الامراض </h5>
                          <p class="card-text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تر</p>
                          <a href="#"><button class="btn details-btn">التفاصيل </button></a>
                        </div>
                      </div>


                    </div>
                    <div class="item">
                      <div class="card" style="width: 22rem;">
                        <i onclick="toggleFavourite(this)"  class="fab fa-gratipay first-heart"></i>
                        <img class="card-img-top" src="{{asset('blood-bank/imgs/p1.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">طريقة الوقاية من الامراض </h5>
                          <p class="card-text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تر</p>
                          <a href="#"><button class="btn details-btn">التفاصيل </button></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                </section>

            </div>

          </div>
      </div>

</section>

@endsection
