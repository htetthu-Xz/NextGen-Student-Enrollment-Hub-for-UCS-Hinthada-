@extends('admin.master')

@section('content')
@php
    use App\Helper\Facades\File;
@endphp

<div class="container py-4">
    <h3 class="text-center pcolor mb-4">Fresher Registration Details</h3>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Fresher Information</strong>
        </div>
        <div class="card-body">
            <table class="table custom-table">
                <tr>
                    <th>Name</th>
                    <td>{{ $fresher->name }}</td>
                    <th>Email</th>
                    <td>{{ $fresher->email }}</td>
                    <th>Phone</th>
                    <td>{{ $fresher->phone }}</td>
                </tr>
                <tr>
                    <th>Admission Document photo</th>
                    <td><a href="{{ asset('storage/admission_docs_ss/' . $fresher->admission_document_screenshot) }}" target="_blank"><span class="btn btn-sm btn-light">Admission Document</span></a></td>
                    <th>Registration Date</th>
                    <td>{{ $fresher->created_at->format('Y-m-d') }}</td>
                </tr>
            </table>
            <div class="d-flex gap-2">
                <form method="POST" action="{{ route('fresher.delete', $fresher->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary">ပယ်ဖျက်မည်</button>
                </form>

                <button type="button" class="btn btn-info" id="acceptBtn">လက်ခံမည်</button>
            </div>

            <form method="POST" action="{{ route('fresher.accept.store', $fresher->id) }}" id="acceptForm" style="display:none;" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email (Edu mail)</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="" required>
                        @error('email')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="uni_id_no" class="form-label">တက္ကသိုလ်မှတ်ပုံတင်အမှတ်</label>
                    <input type="text" name="uni_id_no" id="uni_id_no" class="form-control" placeholder="CU(Hinthada)XXXX" required>
                        @error('uni_id_no')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </div>


</div>
@endsection

@push('scripts')
    <script>
        document.getElementById('acceptBtn').addEventListener('click', function() {
            document.getElementById('acceptForm').style.display = 'block';
        });
    </script>
@endpush
