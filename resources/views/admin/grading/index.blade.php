@extends('admin.master')

@section('page_title', 'Grading')

@section('content')
    <div class="my-5 text-center">
        <h2>GRADING CERTIFICATE CREATION SYSTEM</h2>
    </div>

    <div class="p-4 mt-5 row">
        <p class="mb-3 p-2">Choose Semester that you want to manage.</p>

        @foreach ($semesters as $semester)
            <div class="col-3 mb-4">
                <a href="{{ route('admin.get.grading', [$semester->id]) }}" class="btn btn-outline-info">{{ $semester->name  }} ({{ $semester->code }})</a>
            </div>
        @endforeach
    </div>
@endsection
