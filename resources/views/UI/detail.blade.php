@extends('UI.master')

@push('css')
    <style>
        .clickable-image:hover {
            opacity: 0.9;
            transform: scale(1.02);
            transition: 0.2s ease-in-out;
        }

        #modalImage {
            max-height: 70vh;
            max-width: 100%;
            object-fit: contain;
            border-radius: 6px;
        }

        .modal-content {
            background-color: #1a1a1a;
            border-radius: 12px;
        }

        .btn-close {
            filter: invert(1);
        }

        .close {
            pointer-events: auto !important;
            cursor: pointer !important;
            color: white !important;
            font-size: 1.5rem;
            opacity: 1;
            font-size: 1.5rem;
        }

        .modal-backdrop {
            z-index: 1040 !important;
        }
        .modal {
            z-index: 1050 !important;
        }

        img {
            cursor: pointer;
        }

        .card-img-top:hover {
            transform: scale(1.03);
            transition: transform 0.3s ease-in-out;
            cursor: zoom-in;
        }

        .list-group-item {
            background-color: #f9f9f9;
            border-color: #eee;
        }

        .card {
            border-radius: 12px;
        }
        .card-img-top:hover {
            transform: scale(1.03);
            transition: 0.3s ease-in-out;
            cursor: pointer;
        }
        .card-header {
            font-weight: bold;
        }
    </style>
@endpush

@php
    use App\Helper\Facades\File;
@endphp

@section('content')
<div class="container py-4">
    <div class="card" style="padding: 0 !important;">
        <div class="card-header text-center bg-primary text-white">
            <h4>Registration Details</h4>
        </div>
        <div class="card-body">
            <div class="text-center mt-4">
                <img src="{{ asset(File::GetStudentDataPath(). '/' . $student->profile) }}"
                    class="rounded-circle shadow" style="width: 120px; height: 120px; object-fit: cover;">
                <h4 class="mt-2 text-primary fw-bold">အချက်အလက်များ</h4>
            </div>

            <!-- Academic Information -->
            <div class="card shadow-sm mb-4 mx-auto col-md-8" style="padding: 0 !important;">
                <div class="card-header bg-primary text-white">
                    Academic Information
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Academic Year:</strong> {{ $student->academic_year }}</li>
                    <li class="list-group-item"><strong>Year:</strong> {{ $student->academicYear->name ?? '-' }}</li>
                    <li class="list-group-item"><strong>Major:</strong> {{ $student->major }}</li>
                    <li class="list-group-item"><strong>Roll No:</strong> {{ $student->roll_no }}</li>
                </ul>
            </div>

                <!-- Biography & Family -->
            <div class="card shadow-sm mb-4 col-md-10 mx-auto" style="padding: 0 !important;">
                <div class="card-header bg-primary text-white">
                    Biography & Family
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong><i class="ri-mail-line"></i> Email:</strong> {{ $student->reg_email }}</p>
                            <p><strong><i class="ri-phone-line"></i> Phone:</strong> {{ $student->phone }}</p>
                            <p><strong><i class="ri-calendar-line"></i> Date of Birth:</strong> {{ $student->dob }}</p>
                            <p><strong><i class="ri-map-pin-line"></i> Present Address:</strong> {{ $student->present_address }}</p>
                            <p><strong><i class="ri-user-star-line"></i> Father Name:</strong> {{ $student->father_name }}</p>
                            <p><strong><i class="ri-briefcase-4-line"></i> Father Job:</strong> {{ $student->father_job }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong><i class="ri-home-4-line"></i> Permanent Address:</strong> {{ $student->permanent_address }}</p>
                            <p><strong><i class="ri-group-line"></i> Race:</strong> {{ $student->race }}</p>
                            <p><strong><i class="ri-heart-2-line"></i> Religion:</strong> {{ $student->religion }}</p>
                            <p><strong><i class="ri-user-heart-line"></i> Mother Name:</strong> {{ $student->mother_name }}</p>
                            <p><strong><i class="ri-briefcase-4-line"></i> Mother Job:</strong> {{ $student->mother_job }}</p>
                            <p><strong><i class="ri-phone-find-line"></i> Guardian Phone:</strong> {{ $student->guardian_phone }}</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card shadow-sm mb-4" style="padding: 0% !important;">
                <div class="card-header bg-primary text-white">Submitted Documents</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ([
                            'matriculation_result' => 'Matriculation Result',
                            'nrc_student_front' => 'Student NRC Front',
                            'nrc_student_back' => 'Student NRC Back',
                            'nrc_father_front' => 'Father NRC Front',
                            'nrc_father_back' => 'Father NRC Back',
                            'nrc_mother_front' => 'Mother NRC Front',
                            'nrc_mother_back' => 'Mother NRC Back',
                            'family_member_docs' => 'Family Docs'
                        ] as $field => $label)
                            @if ($student->$field)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <img src="{{ asset(File::GetStudentDataPath(). '/' . $student->$field) }}"
                                            class="card-img-top rounded clickable-image"
                                            style="height: 180px; object-fit: cover;">
                                        <div class="card-body text-center py-2">
                                            <small class="text-muted">{{ $label }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>



            <div class="row justify-content-center mb-4">
                <div class="col-md-6">
                    <h5 class="text-primary text-center">Payment</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Payment Method:</strong> {{ $student->payment_method }}</li>
                        <li class="list-group-item"><strong>Transaction ID:</strong> {{ $student->transaction_id }}</li>
                        <li class="list-group-item"><strong>Note:</strong> {{ $student->payment_note ?? 'N/A' }}</li>
                        <li class="list-group-item text-center">
                            <img src="{{ asset(File::GetStudentDataPath(). '/' . $student->payment_screenshot) }}"
                                class="img-fluid border rounded mt-2 clickable-image" style="max-width: 300px;">
                        </li>
                    </ul>
                </div>
            </div>


            <!-- Status -->
            <h5>Status</h5>
            <p class="badge badge-{{ $student->status === 'pending' ? 'warning' : ($student->status === 'confirm' ? 'success' : 'info') }}">
                {{ ucfirst($student->status) }}
            </p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('.clickable-image').on('click', function() {
                $('#modalImage').attr('src', $(this).attr('src'));
                $('#imageModal').modal('show');
            });

            $('#imageModal').on('hidden.bs.modal', function () {
                $('#modalImage').attr('src', '');
            });
        });
    </script>

@endpush