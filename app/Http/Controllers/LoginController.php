<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    protected $redirectTo = "/main";
    public function __construct()
    {
        $this->middleware("guest")->except("logout");
    }

    public function index()
    {
        return view("auth.login");
    }

    public function processlogin(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        if (auth()->guard('admin')->attempt(['username' => $request->username, 'password' => $request->password, 'status' => "admin"])) {
            return redirect()->route("dashboard")->with("success", "welcome");
        } elseif (auth()->guard('web')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route("main")->with("success", "welcome");
        } else {
            return redirect()->back()->with("error", "Username or password might be incorrect");
        }
    }

    public function reg()
    {
        return view("auth.register");
    }

    public function processreg(Request $request)
    {
        $request->validate([
            "name" => "required|unique:users",
            "username" => "required|unique:users",
            "email" => "required|unique:users",
            "password" => "required"
        ]);

        User::create([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ]);
        return redirect()->route("main");
    }
    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect()->to("/");
    }
}
