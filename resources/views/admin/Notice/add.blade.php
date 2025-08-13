@extends('admin.master')

@section('content')

<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image" style="height: 780px; filter: blur(90px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
    <div class="col-8 mx-auto  mt-5">
        <div class="card mt-5 mb-3 card-small" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);  background-color: rgb(182, 218, 229);">
            <div class="row g-0 d-flex align-items-center shadow-2xl " >
                <div class="col-lg-5 d-none d-lg-flex ">
                    <img src="{{asset('user/images/logo.png')}}"
                        alt="MADB logo" class="w-80 ml-5 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" style="height: 250px" />
                </div>
                <div class="col-lg-7">
                    <div class="mr-5" >
                        <form action="{{route('notice.store')}}" method="post" enctype="multipart/form-data"> @csrf
                            <h5 class="mt-3 mb-4 text-center pcolor"><b>ကျောင်းသားများအတွက်အသိပေးစာရေးရန်</b></h5>

                            {{-- <div class="mb-3">
                                <label for="image-upload" class="mb-1 pcolor"><b>ပုံထည့်ရန်</b></label>
                                <input id="image-upload" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            <div class="mb-3">
                                <label for="title" class="mb-2 pcolor"><b>ခေါင်းစဉ်</b></label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="mb-2 pcolor"><b>အသိပေးစာကိုရေးရန်</b></label>
                                <textarea type="text" name="text" value="{{old('text')}}" class="form-control @error('text') is-invalid @enderror" ></textarea>
                                @error('name')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="my-2 text-center pcolor" >
                                <button class="btn wbtn text-white w-100 mb-3">တင်မည်</button>

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



@endsection
