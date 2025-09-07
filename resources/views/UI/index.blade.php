@extends('UI.master')

@push('css')
<style>
  body {
    font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
    background-color: #eeeeee; /* Changed from #3D8DA8 to a lighter shade */
    color: #222;
  }
  .page-title-bar {
    background: #2C5E72;
    color: #fff;
    padding: 1rem 1.5rem;
    font-weight: 700;
    letter-spacing: .5px;
    border-radius: .5rem .5rem 0 0;
    box-shadow: 0 2px 8px rgba(44,94,114,0.08);
  }
  .soft-panel {
    background: #e0e0e0;
    border: 1px solid #E3E3E3;
    border-radius: .75rem;
    padding: 2rem 1.5rem;
    box-shadow: 0 2px 16px rgba(44,94,114,0.04);
    transition: box-shadow .2s;
  }
  .soft-panel:hover {
    box-shadow: 0 4px 24px rgba(44,94,114,0.10);
  }
  .logo-panel img {
    max-height: 78px;
    filter: drop-shadow(0 2px 8px rgba(44,94,114,0.10));
  }
  .logo-panel .uni-text {
    font-size: 1.15rem;
    line-height: 1.3;
    color: #2C5E72;
    font-weight: 500;
  }
  .logo-panel .fw-bold {
    font-size: 1.25rem;
    color: #3D8DA8;
  }
  .logo-panel .text-uppercase {
    letter-spacing: .12em;
    color: #2C5E72;
    font-size: 1.05rem;
  }
  .slogan {
    font-size: 1.7rem;
    font-weight: 700;
    color: #3D8DA8;
    text-shadow: 0 2px 8px rgba(44,94,114,0.07);
  }
  .more-link {
    font-size: 1rem;
    text-decoration: none;
    transition: color .2s;
  }
  .more-link:hover {
    color: #2C5E72 !important;
    text-decoration: underline;
  }
  .login-card {
    border-radius: .75rem;
    overflow: hidden;
    box-shadow: 0 2px 16px rgba(44,94,114,0.07);
    border: none;
    background: #e0e0e0;
  }
  .login-card .card-header {
    width: ;
    background: #fcfcfc;
    color: #2C5E72;
    font-weight: 700;
    border-bottom: 1px solid #E3E3E3;
    text-align: left;
    font-size: 1.15rem;
    letter-spacing: .5px;
  }
  .login-card .btn-success {
    background: #4089a6;
    border: none;
    font-weight: 600;
    font-size: 1.08rem;
    box-shadow: 0 2px 8px rgba(44,94,114,0.08);
    transition: background .2s;
    color: #f6f2f2;
  }
  .login-card .btn-success:hover {
    background: #2C5E72;
    color: #fff;
  }
  .login-card .btn-success i { margin-left: .35rem; }
  .form-control {
    border-radius: .5rem;
    border: 1px solid #E3E3E3;
    font-size: 1.05rem;
    padding: .75rem 1rem;
    transition: border-color .2s;
  }
  .form-control:focus {
    border-color: #3D8DA8;
    box-shadow: 0 2px 8px rgba(61,141,168,0.07);
  }
  .btn-primary {
    background: #3D8DA8;
    border: none;
    font-weight: 600;
    font-size: 1.08rem;
    box-shadow: 0 2px 8px rgba(61,141,168,0.08);
    transition: background .2s;
    color: #fff;
  }
  .btn-primary:hover {
    background: #2C5E72;
    color: #fff;
  }
  @media (min-width: 992px) {
    .left-wrap { padding-right: 2.5rem; }
  }
  @media (max-width: 991.98px) {
    .soft-panel, .login-card { padding: 1.25rem; }
    .slogan { font-size: 1.25rem; }
    .logo-panel .uni-text { font-size: 1rem; }
  }
  @media (max-width: 767.98px) {
    .container { padding: 0 0.5rem; }
    .soft-panel, .login-card { padding: 1rem; }
    .slogan { font-size: 1.05rem; }
    .logo-panel img { max-height: 54px; }
    .logo-panel .uni-text { font-size: .95rem; }
    .login-card .card-header { font-size: 1rem; }
  }

  .uni {
    font-size:1.15rem; 
    letter-spacing:.70em;
  }

  .sh {
    letter-spacing:.08em !important; 
    font-size: 13px !important;
  }

  .uni-line {
    height:2px; 
    background:#2C5E72; 
    border-radius:1px; 
    flex-basis: 100px; 
    flex-grow: 0;
  }

  .uni-logo {
    margin-left: 20px;
    margin-right: 20px;
  }

  @media (max-width: 575.98px) {
    .uni {
      font-size: 1rem !important;
      letter-spacing: .65em !important;
    }

    .sh {
      letter-spacing:.04em !important; 
      font-size: 11px !important;
    }

    .uni-logo {
      margin-left: 5px;
      margin-right: 5px;
    }

    .uni-line {
      flex-basis: 75px
    }
  }
</style>
@endpush

@section('content')
  <div class="container my-md-5">
    <div class="text-end" style="text-align: right;">
      <a href="{{ asset('admin-assets/Form.pdf') }}" class="btn mb-2 btn-success btn-lg px-4" download>
        Download Registration Form
      </a>
    </div>
    <div class="row g-4 g-lg-5 align-items-start p-2">
      <div class="col-lg-8 left-wrap mt-3">

        <div class="soft-panel logo-panel mb-4">
          <div class="d-flex justify-content-between align-items-center">
            <div class="text-center uni-logo">
              <img src="{{ asset('user/images/logo.png') }}" alt="UIT Logo" class="img-fluid">
            </div>
            <div class="col">
              <div class="uni-text">
                <div class="uni fw-bold">UNIVERSITY</div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                  <span class="uni-line" ></span>
                  <span style="font-weight:500; color:#2C5E72;">of</span>
                  <span class="uni-line" ></span>
                </div>
                <div class="sh text-uppercase">COMPUTER STUDIES, HINTHADA</div>
              </div>
            </div>
          </div>
        </div>

        <div class="soft-panel text-center">
          <div class="slogan mb-4">
            "Step to a Brighter Future in ICT"
          </div>

          <div class="d-grid d-sm-inline-flex gap-2">
            <button type="button" class="btn mb-2 btn-primary btn-lg mx-3 px-4" id="showNewRegFormBtn">
              Register New Student
            </button>
            <a href="{{ route('stu.reg') }}" class="btn mb-2 btn-primary btn-lg px-4">
              Register Old Student
            </a>
          </div>
        </div>
      </div>



      <div class="col-lg-4 mt-5">
        <div class="card shadow-sm login-card" style="padding: 0px">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
              @csrf
                @if(session()->has('unauthenticated'))
                    <div class="alert alert-danger">
                        {{ session()->get('unauthenticated') }}
                    </div>
                @endif
              <div class="mb-3">
                  <label for="email" class="mb-2"><b>Email</b></label>
                  <input type="text" name="email" value="{{ old('email') }}"
                      class="form-control border-0 shadow-sm @error('email') is-invalid @enderror"
                      id="email" placeholder="Enter your email">
                  @error('email')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              <div class="mb-3">
                  <label for="password" class="mb-2"><b>လျှိုဝှက်နံပါတ်ထည့်ရန်</b></label>
                  <input type="password" name="password"
                      class="form-control border-0 shadow-sm @error('password') is-invalid @enderror"
                      id="password" placeholder="Enter your password">
                  @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>
              <button type="submit" class="btn btn-success w-100">
                Log in <i class="fa-solid fa-right-to-bracket"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-4 g-lg-5 align-items-start p-2">
      <div class="col-lg-8 mt-5 new-reg" style="display: none;">
        <div class="card shadow-sm login-card" style="padding: 0px">
          <div class="card-header">
            New Student Register
          </div>
          <div class="card-body">
            <form action="{{ route('fresher.store') }}" id="fresherRegisterForm" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="name" class="mb-2"><b>Name</b></label>
                  <input type="text" name="name" value="{{ old('name') }}"
                          class="form-control shadow-sm border-0 @error('name') is-invalid @enderror"
                          id="name" placeholder="Enter your name">
                  @error('name')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              <div class="mb-3">
                  <label for="email" class="mb-2"><b>Email</b></label>
                  <input type="text" name="email" value="{{ old('email') }}"
                          class="form-control shadow-sm border-0 @error('email') is-invalid @enderror"
                          id="email" placeholder="Enter your email">
                  @error('email')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

            <div class="mb-3">
                <label for="phone" class="mb-2"><b>Phone</b></label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                        class="form-control shadow-sm border-0 @error('phone') is-invalid @enderror"
                        id="phone" placeholder="Enter your phone">
                @error('phone')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="admission_docs" class=""><b>Admission Docs</b></label>
                <input type="file" name="admission_docs"
                        class="form-control shadow-sm p-1 border-0 @error('admission_docs') is-invalid @enderror"
                        id="admission_docs">
                @error('admission_docs')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" id="submitBtn" class="btn btn-success mt-2 w-100">
              Submit
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {

      $('#showNewRegFormBtn').on('click', function() {
        $('.new-reg').show();
        $('html, body').animate({
          scrollTop: $('.new-reg').offset().top
        }, 500);
      });

      $('#submitBtn').on('click', function(e) {
        e.preventDefault(); 
        Swal.fire({
          icon: 'info',
          title: 'အသိပေးစာ',
            html: `
            <div style="text-align:left; font-size:1rem;">
              <p>
              သင်တန်းရေးရာဌာနသို့ လူကိုယ်တိုင် ကျောင်းလာရောက်အပ်နှံရန်လိုအပ်ပါသည်။<br>
              ကျောင်းသားရဲ့ Gmail သို့ကျောင်းမှစာပိုထားပါမည် ဝင်ရောက်စစ်ဆေးပါ။
              </p>
              <b>ပထမနှစ်(ပထမနှစ်ဝက်) သင်တန်း ကျောင်းအပ်ရန် အတွက် လိုအပ်သော စာရွက်စာတမ်းများ</b>
              <ol style="padding-left:1.2em;">
              <li>သန်းခေါင်စာရင်း မူရင်း/မိတ္ထူ (၁) စုံ</li>
              <li>(၆) လအတွင်းရိုက်ကူးထားသောပတ်စပိုဓါတ်ပုံ(အင်္ကျီအဖြူ) (၅) ပုံ</li>
              <li>မှတ်ပုံတင် မူရင်း/မိတ္ထူ (ကျောင်းသားနှင့်မိဘ (၂)ဦး) (၁) စုံ</li>
              <li>တက္ကသိုလ်ဝင်တန်း အောင်လက်မှတ် မူရင်း/မိတ္ထူ (၁) စုံ</li>
              <li>တက္ကသိုလ်ဝင်တန်း အမှတ်စာရင်း မူရင်း/မိတ္ထူ (၁) စုံ</li>
              </ol>
              <ul style="padding-left:1.2em;">
              <li>ကျောင်းအပ်စတင်လက်ခံမည့်ရက် - <b>၂၂.၅.၂၀၂၆</b> (ကြာသာပတေးနေ့) စနေ၊တနင်္ဂနွေမပါ</li>
              <li>ကျောင်းအပ်လက်ခံမည့် နောက်ဆုံးရက် - <b>၆.၆.၂၀၂၆</b> (သောကြာနေ့)</li>
              <li>ကျောင်းစတင်ဖွင့်လှစ်မည့်ရက် - <b>၂.၆.၂၀၂၆</b> (တနင်္လာနေ့)</li>
              </ul>
            </div>
            `,

          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            $('#fresherRegisterForm')[0].submit();
          }
        });
      });
    });
  </script>
@endpush