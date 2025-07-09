<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\EduEmail;

use App\Helper\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function register(Request $request)
    {
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
        $data['password'] = 'P@ssw0rd';

        User::create($data);

        return redirect()->route('admin.list')->with('success', 'ကျောင်းသားသုံး Account တစ်ခု ထည့်လိုက်ပါပြီ');
    }

    public function login(Request $request)
    {


        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            $user = Auth::user();
            $name = $user->name;

            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->intended('/')->with('success', $name . 'အားပြန်လည်ကြိုဆိုပါတယ်');
            }
        }

        return back()->with(['error' => 'Please check your credentials!'])->withInput($request->only('email'));
    }

    public function logout()
    {
        $name = Auth::user()->name;
        Auth::logout();
        return redirect()->route('ui.home')->with('success', $name . 'အားနှုတ်ဆက်ပါတယ်');
    }
}
