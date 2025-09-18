@extends('UI.master')

@push('css')
    <style>
    body {
        font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        background-color: #eeeeee !important;
        color: #222 !important;
    }
    </style>
@endpush

@section('content')
<div style="height: 50px"></div>
<div class="container-fluid md-px-5 sm-px-2" style="width: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
          @if(is_null($regs))
              <h1 class="text-center">သင်အပ်ခဲ့သော  အချက်လက်များ မရှိပါ</h1>
          @else
             <div class="mb-3">သင်အပ်ခဲ့သော အချက်လက်များ</div>
             <div class="table-responsive">
                <table class="custom-table border-success w-100">
                  <thead class="border-success">
                      <tr>
                          <th class="">စဉ်</th>
                          <th class="">အမည်</th>
                          <th class="">သင်တန်းနှစ်</th>
                          <th class="">အထူးပြုဘာသာ</th>
                          <th class="">ခုံနံပါတ်</th>
                          <th class="">ဖုန်းနံပါတ်</th>
                          <th class="">View</th>
                          <th class="">အခြေအနေ</th>
                          <th class="">Manage</th>
                      </tr>
                  </thead>
                  <tbody class="border-success">
                      @php
                          $offset = ($regs->currentPage() - 1) * $regs->perPage();
                      @endphp
                      @foreach ($regs as $reg)
                          <tr>
                              <td class="">{{ $offset + $loop->iteration }}</td>
                              <td class="">{{ $reg->user->name }}</td>
                              <td class="">{{ $reg->academicYear ? $reg->academicYear->name : 'N/A' }}</td>
                              <td class="">{{ Str::ucfirst($reg->major) }}</td>
                              <td class="">{{ $reg->roll_no }}</td>
                              <td class="">{{ $reg->phone }}</td>
                              <td class=""><a href="{{route('ui.view.reg.detail', $reg->id)}}"><i class="fas fa-eye"></i></a></td>
                              <td class="">
                                @if ($reg->is_payment_requested == 1 && $reg->status==="pending")
                                    <span class="badge bg-info p-2">ငွေသွင်းရန် လိုအပ်ပါသည်။</span>
                                @else
                                    @if($reg->status==="pending")
                                        <span class="badge bg-warning text-dark p-2">ကျောင်းအပ်လက်ခံရန်စောင့်ဆိုင်းနေသည်</span>
                                    @elseif ($reg->status==="confirm" && $reg->is_payment_requested == 1)
                                        <span class="badge bg-success p-2">လက်ခံထားသည်(ငွေသွင်းရန် လိုအပ်ပါသည်)</span>
                                    @elseif ($reg->status==="confirm")
                                        <span class="badge bg-success p-2">လက်ခံထားသည်</span>
                                    @else
                                        <span class="badge bg-danger p-2">ပယ်ဖျက်ထားသည်</span>
                                    @endif
                                @endif
                            </td>
                            <td class="">
                                @if($current_payment && !$current_payment->transaction_image)
                                    <form action="{{ route('admin.stu.reg.submit.payment', $reg->id) }}" method="POST" enctype="multipart/form-data" class="d-inline" id="paymentForm-{{ $reg->id }}">
                                        @csrf
                                        <button type="button" class="btn btn-info btn-sm" onclick="showPaymentModal({{ $reg->id }})">ငွေပေးချေမည်</button>
                                    </form>
                                    @php
                                        if ($reg->is_payment_requested == 1) {
                                            $rID = $reg->id;
                                        }
                                    @endphp
                                @else
                                    @if ($reg->status === 'pending' || $reg->status === 'confirm')
                                        -
                                    @else
                                        <a href="{{ route('stu.reg') }}" class="btn btn-success btn-sm mx-2"> အသစ်တင်ရန်</a>
                                        <a href="{{ route('ui.reg.delete', $reg->id) }}" onclick="return confirm('ဖြတ်ရန်သေချာလား?');" class="btn btn-danger btn-sm"> ဖျက်ရန်</a>
                                    @endif
                                @endif
                            </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
              <div class="row mt-2">
                  <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                      {{ $regs->links() }}
                  </div>
              </div>
          @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        function showPaymentModal(regId) {
            const info = @json($paymentInfo);
            const payment = info[regId];
            const current_payment = @json($current_payment);
            const reg = @json($regs->firstWhere('id', $rID ?? 1));
            @php
                $amount = 0;
                if($current_payment) {
                    $amount = $current_payment->StudentRegistration->academicYear->enrollment - $reg->paid_amount;
                }
            @endphp
            const amount = {{ $amount }};
            let paymentDetails = '';
            if (payment) {
                paymentDetails += `<div class="mb-3 p-3 rounded shadow-sm" style="background:#f8f9fa; border:1px solid #e3e3e3;">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <h5 class="fw-bold text-primary mb-2" style="text-align:left;">Last Payment Information</h5>
                        </div>`;
                if (payment.payment_method === 'mobile') {
                    paymentDetails += `<div class="col-12 mb-1" style="text-align:left;"><span class="fw-bold">Mobile Number:</span> <span class="text-dark">${payment.phone_number}</span></div>`;
                } else if (payment.payment_method === 'bank_transfer') {
                    paymentDetails += `<div class="col-6 mb-1" style="text-align:left;"><span class="fw-bold">Bank Name:</span> <span class="text-dark">${payment.bank_name}</span></div>`;
                    paymentDetails += `<div class="col-6 mb-1" style="text-align:left;"><span class="fw-bold">Account Number:</span> <span class="text-dark">${payment.account_number}</span></div>`;
                    paymentDetails += `<div class="col-12 mb-1" style="text-align:left;"><span class="fw-bold">Account Holder Name:</span> <span class="text-dark">${payment.account_holder_name}</span></div>`;
                }
                if (payment.paid_amount) {
                    paymentDetails += `<div class="col-6 mb-1" style="text-align:left;"><span class="fw-bold">Paid Amount:</span> <span class="text-dark">${payment.paid_amount}</span></div>`;
                }
                if (payment.transaction_note) {
                    paymentDetails += `<div class="col-12 mb-1" style="text-align:left;"><span class="fw-bold">Note:</span> <span class="text-dark">${payment.transaction_note}</span></div>`;
                }
                if (payment.transaction_image) {
                    paymentDetails += `<div class='col-12 mb-2' style="text-align:left;"><a href="{{ asset(App\Helper\Facades\File::GetStudentDataPath($reg!=null? $reg->User :'')) }}/${payment.transaction_image}" target="_blank"><img src='{{ asset(App\Helper\Facades\File::GetStudentDataPath($reg!=null? $reg->User :'')) }}/${payment.transaction_image}' class='img-thumbnail border border-primary' style='max-width:220px;'></a></div>`;
                }
                paymentDetails += `<div class="col-12 mb-1" style="text-align:left;"><span class="fw-bold">Paid Type:</span> `;
                paymentDetails += payment.full_paid ? '<span class="badge bg-success">Full Paid</span> ' : '';
                paymentDetails += payment.partial_paid ? '<span class="badge bg-warning">Partial Paid</span> ' : '';
                paymentDetails += `</div>`;
                paymentDetails += `<div class="col-12 mb-1" style="text-align:left;"><span class="fw-bold">Paid Amount:</span> <span class="text-success">{{ number_format($reg->paid_amount?? 0, 2) }} MMK</span></div>`;
                paymentDetails += '</div></div>';
            }
            Swal.fire({
                title: '<span class="fw-bold text-primary" style="text-align:left;">Payment</span>',
                html: `
                    ${paymentDetails}
                    <div class="mb-3" style="text-align:left;">
                        <p>Bank Name: ${current_payment.bank_name}</p>
                        <p>Payment Method: ${current_payment.payment_method}</p>
                        <p>Amount: ${amount} MMK</p>
                        ${current_payment.payment_method === 'mobile' ? `<p>Phone Number: ${current_payment.phone_number}</p>` : ''}
                        ${current_payment.payment_method === 'bank_transfer' ? `<p>Account Number: ${current_payment.account_number}</p><p>Account Holder Name: ${current_payment.account_holder_name}</p>` : ''}
                    </div>
                    <div class="mb-3" style="text-align:left;">
                        <label for="paymentFile-${regId}" class="d-block fw-bold" style="text-align:left;">Transaction Image</label>
                        <input type="file" id="paymentFile-${regId}" name="payment_file" class="form-control mb-2" style="text-align:left;" accept="image/*">
                    </div>
                    <div class="mb-3" style="text-align:left;">
                        <label for="transactionNote-${regId}" class="d-block fw-bold" style="text-align:left;">Transaction Note</label>
                        <input type="text" id="transactionNote-${regId}" name="transaction_note" class="form-control mb-2" style="text-align:left;">
                    </div>
                    <div class="mb-3" style="text-align:left;">
                        <label for="paidAmount-${regId}" class="d-block fw-bold" style="text-align:left;">Paid Amount</label>
                        <input type="number" id="paidAmount-${regId}" name="paid_amount" class="form-control mb-2" style="text-align:left;">
                    </div>
                    <div class="mb-3" style="text-align:left;">
                        <label class="d-block fw-bold mb-1" style="text-align:left;">Paid Type</label>
                        <div class="form-check form-check-inline" style="text-align:left;">
                            <input class="form-check-input" type="radio" name="payment_type" id="fullPaid-${regId}" value="full_paid">
                            <label class="form-check-label" for="fullPaid-${regId}" style="text-align:left;">Full Paid</label>
                        </div>
                        <div class="form-check form-check-inline" style="text-align:left;">
                            <input class="form-check-input" type="radio" name="payment_type" id="partialPaid-${regId}" value="partial_paid">
                            <label class="form-check-label" for="partialPaid-${regId}" style="text-align:left;">Partial Paid</label>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonText: 'Cancel',
                preConfirm: () => {
                    const fileInput = document.getElementById(`paymentFile-${regId}`);
                    const transactionNote = document.getElementById(`transactionNote-${regId}`).value;
                    const paidAmount = document.getElementById(`paidAmount-${regId}`).value;
                    const paymentType = document.querySelector(`input[name='payment_type']:checked`);
                    if (!fileInput.files.length) {
                        Swal.showValidationMessage('Please upload transaction image.');
                        return false;
                    }
                    if (!paymentType) {
                        Swal.showValidationMessage('Please select paid type.');
                        return false;
                    }
                    // Attach file to form and submit
                    const form = document.getElementById(`paymentForm-${regId}`);
                    const formData = new FormData(form);
                    formData.append('transaction_image', fileInput.files[0]);
                    formData.append('transaction_note', transactionNote);
                    formData.append('paid_amount', paidAmount);
                    formData.append('payment_type', paymentType.value);
                    return fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.json();
                    })
                    .catch(error => {
                        console.log(error);
                        Swal.showValidationMessage('Submission failed.');
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Success!', 'Payment has been submitted.', 'success').then(() => {
                        window.location.reload();
                    });
                }
            });
        }
    </script>
@endpush