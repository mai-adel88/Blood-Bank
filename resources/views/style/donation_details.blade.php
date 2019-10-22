@extends('style.index')
@section('content')
<!-- breedcrumb-->
<section id="breedcrumb">
    @foreach($donations as $donate)
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding: 0;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('blood-bank/home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلب التبرع: {{$donate->full_name}}</li>
                    </ol>
                </nav>
            </div>
        </div>


          <div class="row bg-for-details">
            <div class="col-md-6">

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">الاسم</div>
                  </div>
                  <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donate->full_name}}" disabled>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">العمر</div>
                    </div>
                    <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donate->age}}" disabled>
                  </div>
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">المشفي</div>
                      </div>
                      <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donate->hospital_name}}" disabled>
                    </div>
            </div>
            <div class="col-md-6">

              <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">فصيلة الدم</div>
                  </div>
                  <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donate->bloodType->type}}" disabled>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">عدد الاكياس المطلوبة</div>
                    </div>
                    <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donate->num_of_bag}}" disabled>
                  </div>
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">رقم الجوال</div>
                      </div>
                      <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donate->phone}}" disabled>
                    </div>
            </div>
          </div>
          @endforeach
<div class="row bg-white">
  <div class="col-md-12">
    <div class="input-group mb-2">
      <div class="input-group-prepend">
        <div class="input-group-text">عنوان المشفي </div>
      </div>
      <input type="text" class="form-control bg-white" id="inlineFormInputGroup" value="{{$donate->hospital_address}}" disabled>
    </div>

  </div>
  <div class="edit">
    <a href="#"><button class="btn more3-btn ">التفاصيل </button></a>
  </div>


</div>
<div class="row bg-white">
<div class="col-md-12">
<P class="details-text">هذا النص هو مثال لنص يمكن ان يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد النص العربى حيث يمكنك توليد مثل هذا النص أو العديد من النصوص الاخرى إضافة الى زيادة عدد الحروف التى يولدها التطبيق يطلع على صوره حقيقية للتصمصم هذا النص هو مثال لنص يمكن ان يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد النص العربى حيث يمكنك توليد مثل هذا النص أو العديد من النصوص الاخرى إضافة الى زيادة عدد الحروف التى يولدها التطبيق يطلع على صوره حقيقية للتصمصم هذا النص هو مثال لنص يمكن ان يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد النص العربى حيث يمكنك توليد مثل هذا النص أو العديد من النصوص الاخرى إضافة الى زيادة عدد الحروف التى يولدها التطبيق يطلع على صوره حقيقية للتصمصم</P>

</div>

</div>
<div class="row bg-white">
  <div class="col-md-12 map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3418.5968985886584!2d31.358067984893236!3d31.03747868153201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79c2e965f2a2b%3A0xe40902f36db95a15!2sStoneYard+Cafe!5e0!3m2!1sar!2seg!4v1562774242900!5m2!1sar!2seg" width="1110" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>

  </div>
</div>
</div>

</section>

@endsection
