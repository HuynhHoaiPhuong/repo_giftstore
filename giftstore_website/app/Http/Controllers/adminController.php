<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Http\Rediect;
use App\Http\Requests;
session_start();
class adminController extends Controller
{
    // public function authen(){
    //     $admin_id = Session::get('admin_idn');
    //     if($admin_id)
    //         return redirect('dashboard');
    //     else
    //         return redirect('admin_login');
    // }
    public function login(){
        return view('admin_login');
    }
    public function index()
    {
        // $this->authen();
        return view('admin.dashboard');
    }
    
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return redirect('/dashboard');

        }
        else{
            Session::put('message','Incorrect password or email!');
            return redirect('/admin/login');
        }
    }
    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return redirect('/admin/login');
    }
}
