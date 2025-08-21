@extends('admin.master')

@section('content')

<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image" style="height: 780px; filter: blur(15px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
            <div class="col-8 mx-auto  mt-5">
                <div class="card mt-5 mb-3 card-small" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);  background-color: rgb(182, 218, 229);">
                    <div class="row g-0 d-flex align-items-center shadow-2xl " >
                        <div class="col-lg-5 d-none d-lg-flex">
                            <img src="{{asset('user/images/logo.png')}}"
                                alt="MADB logo" class="w-80 ml-2 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" style="height: 250px" />
                        </div>
                        <div class="col-lg-7">
                            <div class="mr-5" >
                                <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="mt-3 mb-4 text-center pcolor"><b>ကျောင်းသားသုံး Account တစ်ခုဖန်တီးရန်</b></h4>

                                    <div class="mb-3">
                                        <label for="image-upload" class="mb-1 pcolor"><b>ပုံထည့်ရန်</b></label>
                                        <input id="image-upload" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                        @error('image')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="mb-2 pcolor"><b>ကျောင်းသား အမည်</b></label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your name">
                                        @error('name')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="mb-2 pcolor"><b>Email</b> (<span class="text-body-tertiary fst-italic fs-6">Email must be edu mail.</span>)</label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your email">
                                        @error('email')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="uni_id_no" class="mb-2 pcolor"><b>တက္ကသိုလ်မှတ်ပုံတင်အမှတ်</b></label>
                                        <input type="text" name="uni_id_no" value="{{old('uni_id_no')}}" class="form-control @error('uni_id_no') is-invalid @enderror" id="uni_id_no" placeholder="CU(Hinthada)XXXX">
                                        @error('uni_id_no')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input @error('transfer_in') is-invalid @enderror" id="transfer_in" name="transfer" {{ old('transfer_in') ? 'checked' : '' }}>
                                        <label class="form-check-label pcolor" for="transfer_in"><b>Transfer In</b></label>
                                        @error('transfer_in')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="my-2 text-center pcolor" >
                                        <button class="btn wbtn text-white w-100 mb-3">အကောင့် လုပ်မည်</button>

                                    </div>
                                    <div class="my-2 text-center pcolor" >
                                        <a href="{{url()->previous()}}" class="btn wbtn text-white w-100 mb-3">Home</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
