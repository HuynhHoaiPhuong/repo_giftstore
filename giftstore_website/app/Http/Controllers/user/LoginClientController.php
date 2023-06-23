<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
session_start();
class LoginClientController extends Controller
{
    public function login(){
        if (Auth::check()) return redirect()->intended('/');
        else return view('user/templates/login');
    }

    public function authenticate(Request $request)
    {        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            Session::put('userLogin', Auth::id());
            $username = $request->input('username');
            Session::put('username', $username);

            return redirect()->route('/');
        }
        return redirect()->route('log-in')->with('error', 'Tài khoản hoặc mật khẩu không hợp lệ');
    }

    public function register(){
        return view('user/templates/login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        return redirect()->route('log-in');
    }
}
