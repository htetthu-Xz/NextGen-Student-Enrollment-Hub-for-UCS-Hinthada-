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
                        <form action="{{ route('fresher.store') }}" id="fresherRegisterForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <h3 class="mb-3 mt-0">ဝင်ခွင့်လျှောက်ရန်....</h3>

                            <div class="p-2 border-0">
                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="mb-2"><b>Name</b></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                           class="form-control border-0 shadow @error('name') is-invalid @enderror"
                                           id="name" placeholder="Enter your name">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
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
                                    <label for="phone" class="mb-2"><b>Phone</b></label>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                           class="form-control border-0 shadow @error('phone') is-invalid @enderror"
                                           id="phone" placeholder="Enter your phone">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Admission Docs -->
                                <div class="mb-3">
                                    <label for="admission_docs" class="mb-2"><b>Admission Docs</b></label>
                                    <input type="file" name="admission_docs"
                                           class="form-control border-0 shadow @error('admission_docs') is-invalid @enderror"
                                           id="admission_docs">
                                    @error('admission_docs')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="my-2">
                                    <button class="btn btn-sm wbtn text-white border border-primary" id="submitBtn">တင်မည်</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div style="height: 65px"></div>
@endsection