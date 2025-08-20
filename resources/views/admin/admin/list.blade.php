@extends('admin.master')
@section('content')
<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('user/images/ucsh1.jpg') }}" alt="Card image" style="height: 780px; filter: blur(60px); object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
                <!-- Page Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-11">
                                    <div class="d-flex jusitfy-content-center gap-3">
                                        <div class="col-12 ">
                                            <form
                                                class="d-none  d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                <div class="input-group">
                                                    <form action="{{ route('admin.list') }}" method="GET">
                                                        @csrf
                                                        <input type="text" name="search" class="form-control border-success small"
                                                               aria-label="Search" aria-describedby="basic-addon2"
                                                               value="{{ request('search') }}" style="">
                                                        <div class="input-group-append">
                                                            <button class="btn wbtn" type="submit">
                                                                <i class="fas fa-search fa-sm text-white"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </form>
                                            <a href="{{route('admin.list')}}" class="btn wbtn text-white" type="submit">
                                                All
                                            </a>
                                            <a href="{{route('add.admin')}}" class="btn wbtn text-white" type="submit">
                                                <i class="fa fa-plus"></i>
                                            </a>

                                        </div>


                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row align-items-center">


                        </div>
                    </div>





                    @if ($admins->isEmpty())
                        <p class="text-danger fw-bold border p-2 rounded text-center my-5">No Reviews has found ! </p>
                    @else
                        <table class="custom-table  border-success table-hover mt-4">
                            <thead class=" border-success">
                                <tr>
                                    <th style="">စဉ်</th>
                                    <th style="">အမည်</th>
                                    <th style="">Email</th>
                                    <th style="">သင်တန်းနှစ်</th>


                                    <th style="">ရပ်နားစရင်းထည့်ရန်</th>
                                    <th style="">ကျောင်းပြောင်းစာရင်းထည့်ရန်</th>
                                    <th style="">Edit</th>
                                    <th style="">Trash</th>

                                </tr>
                            </thead>
                            <tbody class=" border-success">
                                @php
                                    $offset = ($admins->currentPage() - 1) * $admins->perPage();
                                @endphp
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td style="font-size: 1.1rem">{{ $offset + $loop->iteration }}</td>

                                        <td  style="font-size: 1.1rem">
                                            {{ $admin->name }}
                                        </td>

                                        <td style="font-size: 1.1rem">{{ $admin->email }}</td>
                                        <td style="font-size: 1.1rem">{{ $admin->AcademicYear->name }}</td>
                                        <td style="font-size: 1.1rem">
                                        <a href="#" onclick="showSweetConfirm(event, '{{ route('stop.mail', $admin->id) }}', 'Are you sure you want to stop mail for this student?')">
                                            <i class="fas fa-ban" style="color: red"></i>
                                        </a>
                                        </td>
                                        <td style="font-size: 1.1rem">
                                        <a href="#" onclick="showSweetConfirm(event, '{{ route('student.transfer', $admin->id) }}', 'Are you sure you want to transfer this student?')">
                                            <i class="fas fa-exchange-alt" style="color: green"></i>
                                        </a>
                                        </td>
                                        <th><a href="{{route('admin.info.edit',$admin->id)}}"><i class="fas fa-edit" style="color:rgb(18, 124, 18)"></a></i></th>
                                        <th>
                                        <a href="#" onclick="showSweetConfirm(event, '{{ route('admin.delete', $admin->id) }}', 'Are you sure you want to delete this admin?')">
                                            <i class="fas fa-trash-alt" style="color: red"></i>
                                        </a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                                {{ $admins->links() }}
                            </div>

            </div>
            @endif
        @endsection

        @push('scripts')
            <script>

                function showSweetConfirm(event, route, message) {
                    event.preventDefault();
                    Swal.fire({
                        title: '<span style="font-size:16px;">' + message + '</span>',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<span style="font-size:13px; padding:2px 10px;">ထွက်ရန်</span>',
                        cancelButtonText: '<span style="font-size:13px; padding:2px 10px;">မထွက်တော့ပါ</span>',
                        icon: null,
                        width: 300,
                        customClass: {
                            confirmButton: 'py-1 px-2',
                            cancelButton: 'py-1 px-2'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = route;
                        }
                    });
                }
            </script>
        @endpush
