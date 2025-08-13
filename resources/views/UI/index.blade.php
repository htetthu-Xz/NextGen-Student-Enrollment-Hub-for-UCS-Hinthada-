@extends('UI.master')

@push('css')
    <style>
      .mobile-title { display: none; }

      @media (max-width: 768px) {
          .desktop-title { display: none; }
          .mobile-title { display: block; }

          .img-mt {
            margin-top: 70px;
          }
      }
    </style>
@endpush
@section('content')
<div class="mb-4"></div>
<section class="slider_section">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row mt-4 align-items-center">
                        <div class="col-md-7 col-12 mb-4 mb-md-0">
                            <div class="detail-box">
                              <h2 class="w-100 desktop-title" style="font-size: 2.2rem; text-shadow: 2px 2px 4px rgba(82, 87, 155, 0.5);font-family: 'Arial', sans-serif;">
                                  Student Enrollment System For University of Computer Studies, Hinthada
                              </h2>

                              <h2 class="w-100 mobile-title" style="font-size: 2.2rem; text-shadow: 2px 2px 4px rgba(82, 87, 155, 0.5);font-family: 'Arial', sans-serif;">
                                  Student Registration System
                              </h2>
                              <p>ကျောင်းသားကျောင်းသူများ လွယ်ကူလျှင်မြန်စွာ ကျောင်းအပ်ရန် ရည်ရွယ် စီစဉ်ထားပါသည်.</p>
                              <div class="btn-box">
                                <a href="{{route('login')}}" class="btn1">ကျောင်းအပ်မည်</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-1 d-none d-md-block d-sm-none"></div>
                          <div class="col-md-4 col-12 text-center text-md-right">
                            <div class="img img-mt">
                              <img src="{{ asset('user/images/logo.png') }}" alt="" class="img-fluid" style="max-height: 300px;">
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End slider section -->

{{-- <!-- Service section -->
<section class="service_section layout_padding">
  <div class="service_container">
  <div class="container">
    <div class="heading_container heading_center">
    <h2 style="font-size: 2rem; text-shadow: 2px 2px 4px rgba(93, 101, 216, 0.5);font-family: 'Arial', sans-serif;color:rgb(250, 250, 250)">ရနိုင်သော<span class="">၀န်ဆောင်မှုများ</span></h2>
    <p class="text-white">ကွန်ပျူတာ တက္ကသိုလ် (ဟင်္သာတ) ကျောင်းသားရေးရာမှ ရရှိနိင်သော ၀န်ဆောင်မှုများ</p>
    </div>
    <div class="row">
    <div class="col-md-4 col-12 mb-4 mb-md-0">
      <div class="box h-100">
      <div class="img-box mb-3">
        <img src="{{ asset('user/images/s1.png') }}" alt="" class="img-fluid">
      </div>
      <div class="detail-box">
        <h5 class="text-muted">ကျောင်းအပ်နှံခြင်း</h5>
        <p style="font-size:0.8rem" class="text-muted">‌ကျောင်းအပ်နှံခြင်းသည်
          ကျောင်းများပြန်မဖွင့်မည့် ပထမလ အစတွင်း စလက်ခံပါသည်
          အသေးစိပ်အချက် အလက်များကို Notice Board တွင်ကြည့်နိုင်ပါသည်.</p>
      </div>
      </div>
    </div>
    <div class="col-md-4 col-12 mb-4 mb-md-0">
      <div class="box h-100">
      <div class="img-box mb-3">
        <img src="{{ asset('user/images/s2.png') }}" alt="" class="img-fluid">
      </div>
      <div class="detail-box">
        <h5 class="text-muted">ကျောင်းသားဟောင်း အမှတ်စရင်းထုတ်ပေးခြင်း</h5>
        <p style="font-size:0.8rem" class="text-muted">ပထမနှစ်မှစ၍ နောက်ဆုံးနှစ်အတွင်းကျောင်းသားကျောင်းသူများသည် မိမိတို့၏ နှစ်အလိုက် အမှတ်စရင်းများကို ကျောင်းသားရေးရာဌာနတွင် လာရောက်ထုတ်ယူနိုင်ပါသည်.</p>
      </div>
      </div>
    </div>
    <div class="col-md-4 col-12">
      <div class="box h-100">
      <div class="img-box mb-3">
        <img src="{{ asset('user/images/s3.png') }}" alt="" class="img-fluid">
      </div>
      <div class="detail-box">
        <h5 class="text-muted">ပညာသင်ဆုလျှောက်ထားခြင်း</h5>
        <p style="font-size:0.8rem" class="text-muted">ကျောင်းသား/ကျောင်းသူများသည် ပညာသင်ကြားရေးအတွက် အဆင်မပြေမှုများရှိပါက ကျောင်းသားရောရာတွင် ပညာသင်ထောက်ပံ့ကြေးကို လျှောက်ထားနိုင်ပါသည်</p>
      </div>
      </div>
    </div>
    </div>
  </div>
  </div>
</section> --}}
@endsection
