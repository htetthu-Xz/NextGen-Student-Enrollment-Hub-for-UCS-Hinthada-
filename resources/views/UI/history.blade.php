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
                                @if (!$current_payment->transaction_image)
                                    <span class="badge bg-info p-2">ငွေသွင်းရန် လိုအပ်ပါသည်။</span>
                                @else
                                    @if($reg->status==="pending")
                                        <span class="badge bg-warning text-dark p-2">ကျောင်းအပ်လက်ခံရန်စောင့်ဆိုင်းနေသည်</span>
                                    @elseif ($reg->status==="confirm")
                                        <span class="badge bg-success p-2">လက်ခံထားသည်</span>
                                    @else
                                        <span class="badge bg-danger p-2">ပယ်ဖျက်ထားသည်</span>
                                    @endif
                                @endif
                            </td>
                            <td class="">
                                @if(!$current_payment->transaction_image)
                                <form action="{{ route('admin.stu.reg.submit.payment', $reg->id) }}" method="POST" enctype="multipart/form-data" class="d-inline" id="paymentForm-{{ $reg->id }}">
                                    @csrf
                                    <button type="button" class="btn btn-info btn-sm" onclick="showPaymentModal({{ $reg->id }})">ငွေပေးချေမည်</button>
                                </form>
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
            // Get payment info from controller data
            const info = @json($paymentInfo);
            const payment = info[regId];
            let paymentDetails = '';
            if (payment) {
                paymentDetails += '<div class="mb-2 text-start  ">';
                if (payment.payment_method === 'mobile') {
                    paymentDetails += `<strong>Mobile Number:</strong> ${payment.phone_number}<br>`;
                } else if (payment.payment_method === 'bank_transfer') {
                    paymentDetails += `<strong>Bank Name:</strong> ${payment.bank_name}<br>`;
                    paymentDetails += `<strong>Account Number:</strong> ${payment.account_number}<br>`;
                    paymentDetails += `<strong>Account Holder Name:</strong> ${payment.account_holder_name}<br>`;
                }
                if (payment.paid_amount) {
                    paymentDetails += `<strong>Paid Amount:</strong> ${payment.paid_amount}<br>`;
                }
                if (payment.transaction_note) {
                    paymentDetails += `<strong>Note:</strong> ${payment.transaction_note}<br>`;
                }
                if (payment.transaction_image) {
                    paymentDetails += `<div class='mb-2'><a href="{{ asset(App\Helper\Facades\File::GetStudentDataPath($reg->User)) }}/${payment.transaction_image}" target="_blank"><img src='{{ asset(App\Helper\Facades\File::GetStudentDataPath($reg->User)) }}/${payment.transaction_image}' class='img-thumbnail' style='max-width:200px;'></a></div>`;
                }
                paymentDetails += `<strong>Paid Type:</strong> `;
                paymentDetails += payment.full_paid ? '<span class="badge bg-success">Full Paid</span> <br>' : '';
                paymentDetails += payment.partial_paid ? '<span class="badge bg-warning">Partial Paid</span> <br>' : '';
                paymentDetails += `<strong>Left Amount:</strong> {{ $reg->left_amount }}<br>`;
                paymentDetails += '</div>';
            }
            Swal.fire({
                title: 'Payment',
                html: `
                    ${paymentDetails}
                    <div class="text-start mb-2">
                        <label for="paymentFile-${regId}" class="d-block text-start">Transaction Image</label>
                        <input type="file" id="paymentFile-${regId}" name="payment_file" class="form-control mb-2 text-start" accept="image/*">
                    </div>
                    <div class="text-start mb-2">
                        <label for="transactionNote-${regId}" class="d-block text-start">Transaction Note</label>
                        <input type="text" id="transactionNote-${regId}" name="transaction_note" class="form-control mb-2 text-start">
                    </div>
                    <div class="text-start mb-2">
                        <label for="paidAmount-${regId}" class="d-block text-start">Paid Amount</label>
                        <input type="number" id="paidAmount-${regId}" name="paid_amount" class="form-control mb-2 text-start">
                    </div>
                    <div class="form-check mb-2 text-start">
                        <input class="form-check-input" type="checkbox" id="fullPaid-${regId}" name="full_paid">
                        <label class="form-check-label text-start" for="fullPaid-${regId}">Full Paid</label>
                    </div>
                    <div class="form-check mb-2 text-start">
                        <input class="form-check-input" type="checkbox" id="partialPaid-${regId}" name="partial_paid">
                        <label class="form-check-label text-start" for="partialPaid-${regId}">Partial Paid</label>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonText: 'Cancel',
                preConfirm: () => {
                    const fileInput = document.getElementById(`paymentFile-${regId}`);
                    const transactionNote = document.getElementById(`transactionNote-${regId}`).value;
                    const paidAmount = document.getElementById(`paidAmount-${regId}`).value;
                    const fullPaid = document.getElementById(`fullPaid-${regId}`).checked;
                    const partialPaid = document.getElementById(`partialPaid-${regId}`).checked;
                    if (!fileInput.files.length) {
                        Swal.showValidationMessage('Please upload transaction image.');
                        return false;
                    }
                    // Attach file to form and submit
                    const form = document.getElementById(`paymentForm-${regId}`);
                    const formData = new FormData(form);
                    formData.append('transaction_image', fileInput.files[0]);
                    formData.append('transaction_note', transactionNote);
                    formData.append('paid_amount', paidAmount);
                    let type = fullPaid ? 'fully Paid' : 'partially Paid';
                    formData.append('payment_type', type);
                    //console.log(type);
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