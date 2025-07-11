@extends('admin.master')
@section('content')
    <div class="page-wrapper mt-0">
        <div class="card bg-dark text-white">
            <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image"
                style="height: 780px; filter: blur(60px); object-fit: cover; width: 100%;">

            <div class="card-img-overlay d-flex align-items-center justify-content-center">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center mb-5">
                            <h1 class="display-4 fw-bold text-white">Choose Academic Year</h1>
                            <p class="lead text-light">Please select an academic year to continue</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach($years as $year)
                            <div class="col-md-4  mb-4">
                                <a href="{{ route('admin.stu.reg.list', ['academic_year' => $year->id]) }}" class="btn btn-lg btn-primary w-100 py-4 shadow-lg fs-3 fw-semibold" style="border-radius: 1.5rem;">
                                    {{ $year->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
