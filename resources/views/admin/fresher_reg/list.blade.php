@extends('admin.master')
@section('content')
<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image" style="height: 780px; filter: blur(60px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
                <!-- Page Content -->
                <div class="content container-fluid">

                    @if ($freshers->isEmpty())
                        <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Reviews has found ! </p>
                    @else
                        <table class="custom-table  border-success table-hover">
                            <thead class=" border-success">
                                <tr>
                                    <th  style="font-size: 1.3rem">စဉ်</th>
                                    <th style="font-size: 1.3rem">အမည်</th>
                                    <th style="font-size: 1.3rem">Email</th>
                                    <th style="font-size: 1.3rem">Phone</th>
                                    <th style="font-size: 1.3rem">Action</th>
                                </tr>
                            </thead>
                            <tbody class=" border-success">
                                @php
                                    $offset = ($freshers->currentPage() - 1) * $freshers->perPage();
                                @endphp
                                @foreach ($freshers as $fresher)
                                    <tr>
                                        <td style="font-size: 1.1rem">{{ $offset + $loop->iteration }}</td>
                                        <td  style="font-size: 1.1rem">
                                            {{ $fresher->name }}
                                        </td>
                                        <td style="font-size: 1.1rem">{{ $fresher->email }}</td>
                                        <td style="font-size: 1.1rem">{{ $fresher->phone }}</td>
                                        <td style="font-size: 1.1rem">
                                            @if ($fresher->status == 'accepted')
                                                -
                                            @else
                                                <a href="{{ route('fresher.accept', $fresher->id) }}"><i class="fas fa-arrow-right text-primary"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                                {{ $freshers->links() }}
                            </div>

            </div>
            @endif
        @endsection

