<?php
namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();
class LoginController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->intended('admin/index');
        } else {
            return view('admin/login/admin_login');
        }
    }

    public function authenticate(Request $request)
    {        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            Session::put('userLogin', Auth::id());
            $username = $request->input('username');
            Session::put('username', $username);
            return redirect()->intended('admin/index');
        }
        return redirect('login-admin')->with('error', 'Tài khoản hoặc mật khẩu không hợp lệ');
    }

    public function register(){
        return view('admin_register');
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        return redirect('admin/login');
    }
}