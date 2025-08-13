@extends('UI.master')

@push('css')
    <style>
        /* Smooth shadow & rounded card */
        .notice-card {
            border-radius: 12px;
            transition: all 0.3s ease-in-out;
        }
        .notice-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        /* Notice text styling */
        .notice-text {
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .notice-text {
                font-size: 0.95rem;
            }
        }
    </style>
@endpush

@section('content')
    <div style="height: 50px"></div>

    <div class="container my-4">
        @foreach ($notices as $notice)
            <div class="card shadow-lg border-0 mb-4 notice-card">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold text-primary m-0">{{ $notice->title }}</h4>
                    </div>
                    <p class="notice-text text-dark fw-semibold mb-0">
                        {{ $notice->text }}
                    </p>

                </div>
                <div class="card-footer bg-white border-0 text-end">
                    <small class="text-muted">
                        Published: {{ \Carbon\Carbon::parse($notice->created_date)->format('M d, Y') }}
                    </small>
                </div>
            </div>
        @endforeach
    </div>

    <div style="height: 200px"></div>
@endsection
