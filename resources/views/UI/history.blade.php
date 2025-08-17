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
                                @if ($reg->is_request_payment == '1' && $reg->payment_screenshot == null)
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
                                @if($reg->is_request_payment == '1' && $reg->payment_screenshot == null)
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
            Swal.fire({
                title: 'Payment',
                html: `
                    <div>
                        <p>Transfer Phone Number: <strong>09-783543903</strong></p>
                        <label for="paymentFile-${regId}">Payment Proof File:</label>
                        <input type="file" id="paymentFile-${regId}" name="payment_file" class="form-control mb-2" accept="image/*">
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonText: 'Cancel',
                preConfirm: () => {
                    const fileInput = document.getElementById(`paymentFile-${regId}`);
                    if (!fileInput.files.length) {
                        Swal.showValidationMessage('Please upload payment proof file.');
                        return false;
                    }
                    // Attach file to form and submit
                    const form = document.getElementById(`paymentForm-${regId}`);
                    // Create a FormData object and append file
                    const formData = new FormData(form);
                    formData.append('payment_file', fileInput.files[0]);
                    // Submit via AJAX
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