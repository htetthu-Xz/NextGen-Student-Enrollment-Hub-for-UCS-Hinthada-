@extends('UI.master')

@push('css')
    <style>
        .logo-band {
            max-width: 100%;
            height: auto;
        }


        @media (max-width: 576px) {
            .logo-band {
                max-height: 130px;
            }
        }
    </style>
@endpush

@section('content')

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12">
            <div class="card mt-5 mb-3 card-small p-3"
                 style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); background-color: rgb(182, 218, 229);">

                <div class="row g-0 align-items-center shadow-2xl">

                    <!-- Logo (shows on all devices, stacked on small) -->
                    <div class="col-lg-5 col-md-5 col-12 text-center p-3">
                        <img src="{{ asset('user/images/logo.png') }}"
                             alt="MADB logo"
                             class="img-fluid rounded logo-band"
                        >
                    </div>

                    <!-- Form -->
                    <div class="col-lg-7 col-md-7 col-12 p-3">
                        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h3 class="mb-3 mt-0">အကောင့်၀င်ရန် ....</h3>

                            <div class="p-2 border-0">
                                <div class="mb-3">
                                    <label for="email" class="mb-2"><b>Email</b></label>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control border-0 shadow @error('email') is-invalid @enderror"
                                        id="email" placeholder="Enter your email">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="mb-2"><b>လျှို့ဝှက်နံပါတ်ထည့်ရန်</b></label>
                                    <input type="password" name="password"
                                        class="form-control border-0 shadow @error('password') is-invalid @enderror"
                                        id="password" placeholder="Enter your password">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="my-2">
                                    <button class="btn btn-sm wbtn text-white border border-primary">ဝင်မည်</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


    <div style="height: 150px"></div>
@endsection
