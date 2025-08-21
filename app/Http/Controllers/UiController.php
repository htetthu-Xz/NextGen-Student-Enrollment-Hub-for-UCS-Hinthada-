<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\StudentRegistration;
use App\Models\User;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $years = AcademicYear::all();

        return view('UI.sturegist', compact('years'));
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
        $regs = StudentRegistration::where('user_id', Auth::user()->id)->paginate();
        return view('UI.history', compact('regs'));
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
