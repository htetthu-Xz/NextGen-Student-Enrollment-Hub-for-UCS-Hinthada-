@extends('admin.master')

@section('page_title', 'Graging')

@section('content')
    <div class="my-4 text-center">
        <h2>GRADING CERTIFICATE CREATION SYSTEM</h2>
    </div>

    @if (session()->has('success'))
        <div class="mx-3 alert alert-success alert-dismissible fade show my-2" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('errors'))
        <div class="mx-3 alert alert-danger alert-dismissible fade show my-2" role="alert">
            {{ session('errors') }}
        </div>
    @endif

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#delete-btn').on('click', function() {
            if(confirm('ဖြတ်ရန်သေချာပါသလား')) {
                $('#delete-form').submit();
            }
        })
    })
</script>
@endpush
