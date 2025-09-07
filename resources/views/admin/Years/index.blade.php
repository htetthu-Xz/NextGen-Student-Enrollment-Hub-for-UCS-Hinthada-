@extends('admin.master')
@section('content')
<div class="page-wrapper mt-0">
    <div class="card bg-dark text-white">
        <img class="w-100" src="{{ asset('admin-assets/bg.png') }}" alt="Card image" style="height: 780px; object-fit: cover;">
        <div class="card-img-overlay">
            <!-- Page Content -->
                <!-- Page Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="page-header">
                            <div class="row">
                                {{-- <div class="col-11">
                                    <div class="d-flex justify-content-center gap-3">
                                        <div class="col-12">
                                            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                <div class="input-group">
                                                    <form action="{{ route('admin.list') }}" method="GET">
                                                        @csrf
                                                        <input type="text" name="search" class="form-control mx-1 border-success small"
                                                               aria-label="Search" aria-describedby="basic-addon2"
                                                               value="{{ request('search') }}">
                                                        <select name="major" class="form-control border-success">
                                                            <option value="">Select Transfer Type</option>
                                                            <option value="computer science"
                                                                {{ request('major') == 'computer science' ? 'selected' : '' }}>
                                                                Computer Science</option>
                                                            <option value="computer technology"
                                                                {{ request('major') == 'computer technology' ? 'selected' : '' }}>
                                                                Computer Technology</option>
                                                            <option value="CST"
                                                                {{ request('major') == 'CST' ? 'selected' : '' }}>CST</option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button class="btn wbtn" type="submit">
                                                                <i class="fas fa-search fa-sm text-white"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                        <a href="{{ route('transfer.stu.export') }}" class="w-auto btn btn-success d-flex align-items-center gap-2">
                                            <i class="fas fa-file-excel"></i>
                                            Export
                                        </a>
                                    </div>
                                </div> --}}

                                <div class="col-12 mb-3">
                                    <button type="button" class="btn btn-success" onclick="showAddYearSwal()">
                                        <i class="fas fa-plus"></i> Add Year
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">


                        </div>
                    </div>





                    @if ($years->isEmpty())
                        <p class="text-danger fw-bold border p-2 rounded text-center my-5">ပညာသင်နှစ်များ မရှိပါ ! </p>
                    @else
                        <table class="custom-table  border-success table-hover mt-4">
                            <thead class=" border-success">
                                <tr>
                                    <th  style="font-size: 1.3rem">စဉ်</th>
                                    <th style="font-size: 1.3rem">နှစ်</th>
                                    <th style="font-size: 1.3rem">Active status</th>
                                     <th style="font-size: 1.3rem">Created At</th>
                                    <th style="font-size: 1.3rem">Action</th>



                                </tr>
                            </thead>
                            <tbody class=" border-success">
                                @php
                                    $offset = ($years->currentPage() - 1) * $years->perPage();
                                @endphp
                                @foreach ($years as $year)
                                    <tr>
                                        <td style="font-size: 1.1rem">{{ $offset + $loop->iteration }}</td>

                                        <td  style="font-size: 1.1rem">
                                            {{ $year->name }}
                                        </td>

                                        <td style="font-size: 1.1rem">{{ $year->is_current == 1 ? 'YES' : 'NO' }}</td>

                                        <td style="font-size: 1.1rem">{{ $year->created_at }}</td>
                                        <td style="font-size: 1.1rem">
                                            <button type="button" class="btn btn-warning btn-sm me-2" onclick="showEditYearSwal({{ $year->id }})">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteYearSwal({{ $year->id }})">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </td>





                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                                {{ $years->links() }}
                            </div>

            </div>
            @endif
        @endsection

@push('scripts')
    <script>
        function showAddYearSwal() {
            Swal.fire({
                title: 'Create Year',
                html: `
                    <input type="text" id="yearName" class="form-control mb-3" placeholder="Year Name" required>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="isCurrent">
                        <label class="form-check-label" for="isCurrent">Is Current Year</label>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Create',
                cancelButtonText: 'Cancel',
                preConfirm: () => {
                    const name = document.getElementById('yearName').value;
                    const isCurrent = document.getElementById('isCurrent').checked ? 1 : 0;
                    if (!name) {
                        Swal.showValidationMessage('Year name is required');
                        return false;
                    }
                    return { name, is_current: isCurrent };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('years.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify(result.value)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Success!', 'Year created successfully.', 'success').then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire('Error!', data.message || 'Failed to create year.', 'error');
                        }
                    })
                    .catch(() => {
                        Swal.fire('Error!', 'Failed to create year.', 'error');
                    });
                }
            });
        }

        function showEditYearSwal(yearId) {
            fetch(`/years/${yearId}/edit`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Edit Year',
                            html: `
                                <input type="text" id="editYearName" class="form-control mb-3" value="${data.year.name}" required>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="editIsCurrent" ${data.year.is_current ? 'checked' : ''}>
                                    <label class="form-check-label" for="editIsCurrent">Is Current Year</label>
                                </div>
                            `,
                            showCancelButton: true,
                            confirmButtonText: 'Update',
                            cancelButtonText: 'Cancel',
                            preConfirm: () => {
                                const name = document.getElementById('editYearName').value;
                                const isCurrent = document.getElementById('editIsCurrent').checked ? 1 : 0;
                                if (!name) {
                                    Swal.showValidationMessage('Year name is required');
                                    return false;
                                }
                                return { name, is_current: isCurrent };
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch(`/years/${yearId}`, {
                                    method: "PUT",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify(result.value)
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire('Success!', 'Year updated successfully.', 'success').then(() => {
                                            window.location.reload();
                                        });
                                    } else {
                                        Swal.fire('Error!', data.message || 'Failed to update year.', 'error');
                                    }
                                })
                                .catch(() => {
                                    Swal.fire('Error!', 'Failed to update year.', 'error');
                                });
                            }
                        });
                    }
                });
        }

        function showDeleteYearSwal(yearId) {
            Swal.fire({
                title: 'Are you sure you want to delete this year?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/years/${yearId}`, {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Deleted!', 'Year deleted successfully.', 'success').then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire('Error!', data.message || 'Failed to delete year.', 'error');
                        }
                    })
                    .catch(() => {
                        Swal.fire('Error!', 'Failed to delete year.', 'error');
                    });
                }
            });
        }
    </script>
@endpush