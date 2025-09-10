<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthServiceProvider;

class UiController extends Controller
{
    public function home(Request $request)
    {
        return view('UI.index');
    }
    public function contact()
    {
        return view('UI.contact');
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function stuReg()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->back()->with('error', 'Admin cannot register as a student');
        }
        $years = AcademicYear::all();
        $yrs = Year::where('is_current', 1)->first();
        return view('UI.sturegist', ['years' => $years, 'yrs' => $yrs]);
    }

    public function uiRegister()
    {
        return view('Auth.register');
    }

    public function userStore(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            "name" => "required",
            "email" => 'required|email|unique:users,email',
            "uni_id_no" => 'required|unique:users,uni_id_no',
            "image" => "required|image|mimes:png,jpg,jpeg"
        ], [
            "name.required" => "Name is required.",
            "email.required" => "Email is required.",
            "email.email" => "Please enter a valid email address.",
            "email.unique" => "This email is already registered.",
            "uni_id_no.required" => "University ID number is required.",
            "uni_id_no.unique" => "This University ID number is already registered.",
            "image.required" => "Image is required.",
            "image.image" => "The file must be an image.",
            "image.mimes" => "The image must be a file of type: png, jpg, jpeg."
        ]);

        $image = $request->file('image');
        $imageName = uniqid() . 'soe' . $image->getClientOriginalName();
        $image->storeAs('public/images/', $imageName);
        $data['image'] = $imageName;
        $data['password'] = bcrypt('P@ssw0rd');

        User::create($data);

        return redirect()->route('ui.login')->with('success', 'Success Register');
    }

    public function history()
    {
        $regs = StudentRegistration::where('user_id', Auth::user()->id)->with(['payments' => function ($q) {
            $q->orderByDesc('created_at');
        }])->paginate();

        $paymentInfo = [];
        $reg = $regs->whereIn('status', ['pending', 'confirm'])->first();

        $current_payment = $reg->payments()->where('status', 'pending')->first();
        if ($reg) {
            $successPayment = $reg->payments->whereIn('status', ['completed', 'partial_paid'])->first();

            if ($successPayment) {
                $paymentInfo[$reg->id] = [
                    'bank_name' => $successPayment->bank_name ?? '',
                    'payment_method' => $successPayment->payment_method ?? '',
                    'phone_number' => $successPayment->phone_number ?? '',
                    'account_number' => $successPayment->account_number ?? '',
                    'account_holder_name' => $successPayment->account_holder_name ?? '',
                    'transaction_image' => $successPayment->transaction_image ?? '',
                    'transaction_note' => $successPayment->transaction_note ?? '',
                    'paid_amount' => $successPayment->paid_amount ?? '',
                    'full_paid' => $successPayment->payment_type == 'fully Paid' ? true : false,
                    'partial_paid' => $successPayment->payment_type == 'partially Paid' ? true : false,
                    'left_amount' => $reg->academicYear->enrollment - $reg->paid_amount
                ];
            } else {
                $paymentInfo[$reg->id] = null;
            }
        }
        //dd($paymentInfo, $reg, $successPayment);
        return view('UI.history', compact('regs', 'paymentInfo', 'reg', 'current_payment'));
    }
    public function showImage($name)
    {

        $image = $name;

        return view('UI.image', compact('image'));
    }

    public function viewDetail($id)
    {
        $student = StudentRegistration::findOrFail($id);
        return view('UI.detail', compact('student'));
    }

    public function regDelete($id)
    {
        $reg = StudentRegistration::find($id);
        if ($reg->status === "confirm") {
            return back()->with('error', 'ကျောင်းသားရေးရာမှ ကျောင်းအပ်ခြင်းကို လက်ခံထားပြီးဖြစ်သောကြောင့် ဖျက်၍မရနိုင်ပါ');
        } else {
            $reg->delete();
            return back()->with('success', 'သင်၏ ကျောင်းအပ်ထားသော formအားဖျက်ပြီးပါပီ');
        }
    }


    public function regEdit($id)
    {
        $student = StudentRegistration::find($id);
        $years = AcademicYear::all();
        return view('UI.editReg', compact('student', 'years'));
    }
}
