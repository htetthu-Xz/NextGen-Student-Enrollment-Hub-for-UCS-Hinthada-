@extends('admin.master')

@section('content')
@php
    use App\Helper\Facades\File;
@endphp

<div class="container py-4">
    <h3 class="text-center pcolor mb-4">Student Registration Details</h3>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Personal Information</strong>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset(File::GetStudentDataPath($registration->User) . $registration->profile) }}" class="profileimg img-thumbnail" style="width: 150px; height: 150px;" alt="Profile">
            </div>
            <table class="table custom-table">
                <tr>
                    <th>Name</th>
                    <td>{{ $registration->user->name }}</td>
                    <th>Academic Year</th>
                    <td>{{ $registration->academic_year }}</td>
                </tr>
                <tr>
                    <th>Year</th>
                    <td>{{ $registration->academicYear->name }}</td>
                    <th>Major</th>
                    <td>{{ $registration->major }}</td>
                </tr>
                <tr>
                    <th>Roll No</th>
                    <td>{{ $registration->roll_no }}</td>
                    <th>Phone</th>
                    <td>{{ $registration->phone }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $registration->reg_email }}</td>
                    <th>DOB</th>
                    <td>{{ $registration->dob }}</td>
                </tr>
                <tr>
                    <th>Present Address</th>
                    <td colspan="3">{{ $registration->present_address }}</td>
                </tr>
                <tr>
                    <th>NRC</th>
                    <td>{{ $registration->nrc_student }}</td>
                    <th>Race / Religion</th>
                    <td>{{ $registration->race }} / {{ $registration->religion }}</td>
                </tr>
                <tr>
                    <th>Blood Type</th>
                    <td>{{ $registration->blood_type }}</td>
                    <th>Matriculation Result</th>
                    <td><a href="{{ asset(File::GetStudentDataPath($registration->User) . $registration->matriculation_result) }}" target="_blank">View File</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header bg-info text-white">
            <strong>Family Details</strong>
        </div>
        <div class="card-body">
            <table class="table custom-table">
                <tr>
                    <th>Father Name / Job</th>
                    <td>{{ $registration->father_name }} / {{ $registration->father_job }}</td>
                    <th>Mother Name / Job</th>
                    <td>{{ $registration->mother_name }} / {{ $registration->mother_job }}</td>
                </tr>
                <tr>
                    <th>Guardian Name</th>
                    <td>{{ $registration->guardian_name }}</td>
                    <th>Relation</th>
                    <td>{{ $registration->guardian_relation }}</td>
                </tr>
                <tr>
                    <th>Guardian Job</th>
                    <td>{{ $registration->guardian_job }}</td>
                    <th>Guardian Phone</th>
                    <td>{{ $registration->guardian_phone }}</td>
                </tr>
                <tr>
                    <th>Permanent Address</th>
                    <td colspan="3">{{ $registration->permanent_address }}</td>
                </tr>
                <tr>
                    <th>Family Docs</th>
                    <td colspan="3">
                        <a href="{{ asset(File::GetStudentDataPath($registration->User) . $registration->family_member_docs) }}" target="_blank">View File</a>
                    </td>
                </tr>
            </table>

            {{-- NRC Photos Section --}}
            <h5 class="text-center mt-4 pcolor">Submitted Document</h5>
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Student NRC Front</label>
                    <a href="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_student_front) }}" target="_blank">
                        <img src="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_student_front) }}" class="img-thumbnail" width="150">
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Student NRC Back</label>
                    <a href="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_student_back) }}" target="_blank">
                        <img src="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_student_back) }}" class="img-thumbnail" width="150">
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Father NRC Front</label>
                    <a href="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_father_front) }}" target="_blank">
                        <img src="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_father_front) }}" class="img-thumbnail" width="150">
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Father NRC Back</label>
                    <a href="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_father_back) }}" target="_blank">
                        <img src="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_father_back) }}" class="img-thumbnail" width="150">
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Mother NRC Front</label>
                    <a href="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_mother_front) }}" target="_blank">
                        <img src="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_mother_front) }}" class="img-thumbnail" width="150">
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Mother NRC Back</label>
                    <a href="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_mother_back) }}" target="_blank">
                        <img src="{{ asset(File::GetStudentDataPath($registration->User) . $registration->nrc_mother_back) }}" class="img-thumbnail" width="150">
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Matriculation certificate</label>
                    <a href="{{ asset(File::GetStudentDataPath($registration->User) . $registration->matriculation_certificate) }}" target="_blank">
                        <img src="{{ asset(File::GetStudentDataPath($registration->User) . $registration->matriculation_certificate) }}" class="img-thumbnail" width="150">
                    </a>
                </div>
            </div>
        </div>
    </div>


    @if($registration->payments ?? false)
        @if ($registration->paid_amount !== 0)
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">
                    <strong>Payment Information</strong>
                </div>
                @foreach ($registration->payments as $payment)
                    @if ($payment->transaction_image ?? false)
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $loop->iteration == 1 ? 'First Payment' : ($loop->iteration == 2 ? 'Second Payment' : ($loop->iteration == 3 ? 'Third Payment' : $loop->iteration . 'th Payment')) }}
                            </h5>
                            <table class="table custom-table">
                                <tr>
                                    <th>Bank Name</th>
                                    <td>{{ $payment->bank_name }}</td>
                                    <th>Payment Method</th>
                                    <td>{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</td
                                </tr>
                                <tr>
                                    <th>Transaction Note</th>
                                    <td>{{ $payment->transaction_note }}</td>
                                    <th>Payment Type</th>
                                    <td>{{ ucfirst(str_replace('_', ' ', $payment->payment_type)) }}</td>
                                </tr>
                                <tr>
                                    <th>Paid Amount</th>
                                    <td>{{ number_format($payment->amount, 2) }} MMK</td>
                                    <th>Transaction Image</th>
                                    <td colspan="3">
                                        <a href="{{ asset(File::GetStudentDataPath($registration->User) . $payment->transaction_image) }}" target="_blank">
                                            View Image
                                        </a>
                                    </td>
                                </tr>

                                @if ($payment->status == 'pending')
                                    <tr>
                                        <th>Action</th>
                                        <td colspan="3"><a href="{{ route('admin.stu.payment.complete', $payment->id) }}" class="btn btn-success">Complete Payment</a></td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endif

    <div class="text-center mt-4">
        @if ($payment->transaction_image ?? false)
            @if ($registration->status === 'pending')
                <a href="{{ route('admin.stu.accept', $registration->id) }}" class="btn btn-success mx-2">
                    <i class="fa fa-check"></i> Accept
                </a>
            @endif
        @endif

        @if ($registration->status !== 'confirm')
            <a href="#" onclick="showRejectPrompt({{ $registration->id }}); return false;" class="btn btn-danger mx-2">
                <i class="fa fa-times"></i> Reject
                <form id="reject-form-{{ $registration->id }}" action="{{ route('admin.stu.reg.delete', $registration->id) }}" method="POST" style="display:none;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="reject_message" id="reject-message-{{ $registration->id }}">
                </form>
            </a>
        @endif

        @if ($registration->is_payment_requested == 0 && $registration->payment_type == 'partial_paid' && $registration->is_payment_completed == 0 && $registration->left_amount >= 0)
            <a href="#" onclick="showRequestPaymentPrompt({{ $registration->id }}); return false;" class="btn btn-warning mx-2">
                <i class="fa fa-money-bill"></i> Request Payment
            </a>
        @endif

        @if ($registration->is_payment_completed !== 1)
            <a href="{{ route('admin.stu.payment.skip', $registration->id) }}" class="btn btn-info mx-2">
                <i class="fa fa-credit-card"></i> Skip Payment
            </a>
        @endif
    </div>
</div>
@endsection

@push('scripts')
    <script>
        
        function showRejectPrompt(regId) {
            Swal.fire({
                title: 'Reject Message',
                input: 'textarea',
                inputLabel: 'Enter the reason for rejection',
                inputPlaceholder: 'Type your message here...',
                showCancelButton: true,
                confirmButtonText: 'Send',
                cancelButtonText: 'Cancel',
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to write a message!'
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('reject-message-' + regId).value = result.value;
                    document.getElementById('reject-form-' + regId).submit();
                }
            });
        }

        function showRequestPaymentPrompt(regId) {
            Swal.fire({
                title: 'Request Payment',
                html: `
                    <label for="bankName" class="form-label text-start d-block">Bank Name</label>
                    <input type="text" id="bankName" class="form-control mb-2" value="KBZ" placeholder="Bank Name" required>

                    <label for="paymentMethod" class="form-label text-start d-block">Payment Method & Account information</label>
                    <select id="paymentMethod" class="form-control mb-2">
                        <option value="">Select Method</option>
                        <option value="mobile">Mobile</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>

                    <input type="text" id="phoneNumber" class="form-control mb-2" placeholder="Phone Number" style="display:none;">

                    <input type="text" id="accountNumber" class="form-control mb-2" placeholder="Account Number" style="display:none;">

                    <input type="text" id="accountHolderName" class="form-control mb-2" placeholder="Account Holder Name" style="display:none;">

                    <hr class="my-3 bg-dark">

                    <label for="fee1" class="form-label text-start d-block">သင်တန်းနှစ်ကြေး</label>
                    <input type="number" id="reg_fee" class="form-control mb-2">

                    <label for="fee2" class="form-label text-start d-block">ကျောင်းဝင်ကြေး</label>
                    <input type="number" id="school_entry_fee" class="form-control mb-2" value="0.00">

                    <label for="fee3" class="form-label text-start d-block">စာမေးပွဲကြေး</label>
                    <input type="number" id="exam_fee" class="form-control mb-2" value="0.00">

                    <label for="fee4" class="form-label text-start d-block">အားကစားကြေး</label>
                    <input type="number" id="sport_fee" class="form-control mb-2" value="0.00">

                    <label for="description" class="form-label text-start d-block">Description (optional)</label>
                    <textarea id="description" class="form-control mb-2" placeholder="Description"></textarea>
                `,
                showCancelButton: true,
                confirmButtonText: 'Send',
                cancelButtonText: 'Cancel',
                preConfirm: () => {
                    
                    const bankName = document.getElementById('bankName').value;
                    const method = document.getElementById('paymentMethod').value;
                    const phoneNumber = document.getElementById('phoneNumber').value;
                    const accountNumber = document.getElementById('accountNumber').value;
                    const accountHolderName = document.getElementById('accountHolderName').value;
                    const regFee = document.getElementById('reg_fee').value;
                    const schoolEntryFee = document.getElementById('school_entry_fee').value;
                    const examFee = document.getElementById('exam_fee').value;
                    const sportFee = document.getElementById('sport_fee').value;
                    const description = document.getElementById('description').value;

                    if (!bankName) return 'Bank name is required';
                    if (!method) return 'Payment method is required';
                    if (method === 'mobile' && !phoneNumber) return 'Phone number is required';
                    if (method === 'bank_transfer' && !accountNumber) return 'Account number is required';

                    return { bank_name: bankName, payment_method: method, phone_number: phoneNumber, account_number: accountNumber, account_holder_name: accountHolderName, reg_fee: regFee, school_entry_fee: schoolEntryFee, exam_fee: examFee, sport_fee: sportFee, payment_note: description };
                },
                didOpen: () => {
                    document.getElementById('reg_fee').value = "{{ $registration->academicYear->enrollment }}";
                    document.getElementById('paymentMethod').addEventListener('change', function() {
                        const method = this.value;
                        document.getElementById('phoneNumber').style.display = method === 'mobile' ? 'block' : 'none';
                        document.getElementById('accountNumber').style.display = method === 'bank_transfer' ? 'block' : 'none';
                        document.getElementById('accountHolderName').style.display = method === 'bank_transfer' ? 'block' : 'none';
                    });
                }
            }).then((result) => {
                if (result.isConfirmed && typeof result.value === 'object') {
                    Swal.fire({
                        title: 'Processing...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    fetch(`/studentReg/request-payment/${regId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(result.value)
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.close();
                        if (data.success) {
                            Swal.fire('Success!', 'Payment request sent.', 'success').then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire('Error!', data.message || 'Failed to request payment.', 'error');
                        }
                    })
                    .catch(() => {
                        Swal.fire('Error!', 'Failed to request payment.', 'error');
                    });
                }
            });
        }
        
    </script>
@endpush