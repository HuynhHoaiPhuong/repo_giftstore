<?php

namespace App\Http\Controllers\web;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

session_start();

class AdminController extends Controller
{
    public function login(){
        return view('admin_login');
    }
    
    public function checkLogin(Request $request){
        $admin_username = $request->admin_username;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_user')->where('username', $admin_username)->where('password',$admin_password)->first();
        if($result){
            Session::put('username',$result->username);
            Session::put('id', $result->id);
            return redirect('/');
        }
        else{
            Session::put('message','Incorrect password or email!');
            return redirect('/admin/login');
        }
    }
    
    public function logout(){
        Session::put('username',null);
        Session::put('id',null);
        return redirect('/admin/login');
    }
}