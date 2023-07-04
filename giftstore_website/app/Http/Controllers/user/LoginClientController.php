<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\services\UserController as ServicesUserController;
use App\Http\Controllers\services\MemberController as ServicesMemberController;
session_start();
class LoginClientController extends Controller
{
    public function login(){
        if (Auth::check()) return redirect()->intended('/');
        else return view('user/templates/login');
    }

    public function authenticate(Request $request){        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            Session::put('userLogin', Auth::id());
            $username = $request->input('username');
            Session::put('username', $username);

            return redirect()->route('/');
        }
        return redirect()->route('log-in')->with('error', 'Tài khoản hoặc mật khẩu không hợp lệ');
    }

    public function register(Request $req){
        $memberController = new ServicesMemberController();
        $userController = new ServicesUserController();
        $reqUser = new Request([
            'username'=>$req->username,
            'password'=>$req->password,
            'fullname'=>$req->fullname,
            'id_role'=> 2,
            'phone'=>$req->phone,
            'address'=>$req->address,
        ]);
        $data_user = $userController->saveUser($reqUser);
        $user = [];
        if($data_user['data']!=null)
            $user = $data_user['data'];
        else
            return redirect()->route('log-in')->with('error', $data_user['message']);
        
        $reqMember = new Request([
            'id_user'=>$user->id_user,
            'id_rank'=>'RANK230518015825422',
            'current_point'=> 0,
        ]);
        $data_member = $memberController->saveMember($reqMember);
        $member = [];
        if($data_member['data']!=null)
            $member = $data_member['data'];
        else
            return redirect()->route('log-in')->with('error', $data_member['message']);

        return redirect()->route('log-in')->with('error', 'Tạo tài khoản thành công!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        return redirect()->route('log-in');
    }
}
