<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function create_ar()
    {
        return view('admin.login_ar');
    }

    public function create_en()
    {
        return view('admin.login_en');
    }

    public function store(Request $request)
    {
        // dd('qwe');
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user)
        {
            session()->flash('notRegister', "الايميل غير مسجل لدينا");
            return redirect()->back();
        }

        if (Hash::check($request->password, $user->password)) {
            auth()->login($user);

            $userAgent = $request->header('User-Agent');
            if (strpos($userAgent, 'Mobile') !== false) {
                $userAgent = "Mobile Device";
            } elseif (strpos($userAgent, 'Tablet') !== false) {
                $userAgent = "Tablet Device";
            } else {
                $userAgent = "Desktop Device";
            }

            LoginLog::create([
                'user_id' => auth()->user()->id,
                'ip_address' => request()->ip(),
                'user_device' => $userAgent
            ]);
            return redirect()->route('home');
        }
        session()->flash('passOemail', "هناك خطأ في كلمة المرور او الايميل");

        return redirect()->back()->with(["passOemail", "هناك خطأ في كلمة المرور او الايميل"]);
    }

    public function logout()
    {
        Session::flush();
        auth()->logout();
        return redirect()->route('login.create_ar');
    }



}
