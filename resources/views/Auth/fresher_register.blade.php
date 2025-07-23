@extends('UI.master')

@section('content')

<div class="container">
    <div style="height: 30px">

    </div>
    <div class="col-8 mx-auto mt-5">
        <div class="card mt-5 mb-3 card-small" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);  background-color: rgb(182, 218, 229);">
            <div class="row g-0 d-flex align-items-center shadow-2xl" >
                <div class="col-lg-5 d-none d-lg-flex ">
                    <img src="{{asset('user/images/logo.png')}}"
                        alt="MADB logo" class="w-80 ml-5 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" style="height: 250px" />
                </div>
                <div class="col-lg-7">
                    <div class="mr-5">
                        <form action="{{ route('fresher.store') }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            <h3>ဝင်ခွင့်လျှောက်ရန်....</h3>


                            <div class=" p-4 border-0 ">
                                <div class="mb-3">
                                    <label for="name" class="mb-2"><b>Name</b></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control border-0 shadow @error('name') is-invalid @enderror"
                                        id="name" placeholder="Enter your name">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
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
                                    <label for="admission_docs" class="mb-2"><b>admission_docs</b></label>
                                    <input type="file" name="admission_docs" value="{{ old('admission_docs') }}"
                                        class="form-control border-0 shadow @error('admission_docs') is-invalid @enderror"
                                        id="admission_docs" placeholder="Enter your admission_docs">
                                    @error('admission_docs')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="my-2">
                                    <button class="btn btn-sm  wbtn text-white border border-primary ">တင်မည်</button>
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



@endsection
