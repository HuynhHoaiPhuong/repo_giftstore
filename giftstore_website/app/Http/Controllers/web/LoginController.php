<?php
namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    public function login(){
        return view('admin_login');
    }

    public function checkLogin(Request $request)
    {        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('admin/index');
        }
        return redirect('admin/login')->with('error', 'Tài khoản hoặc mật khẩu không hợp lệ');
    }

    public function register(){
        return view('admin_register');
    }
    public function save(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'fullname' => 'required',
            'password' => 'required|min:6|max:32',
            'confirm' => 'same:password',
            'phone' => 'required|max:12',
            'gender' => 'required',
            'birthday' => 'required',
            'timestamps' => 'false'
        ]);
        $datenow = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s');
        $data = array();
        $data['id_user'] = $request->id_role.$datenow;
        $data['id_role'] = $request->id_role;
        $data['username'] = $request->username;
        $data['password'] = bcrypt($request->password);
        $data['user_token'] = Str::random(32);
        $data['photo'] = $request->photo;
        $data['fullname'] = $request->fullname;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['birthday'] = $request->birthday;
        DB::table('users')->insert($data); 
        return redirect()->route('register')->with('success', 'Created successfully!');
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        return redirect('admin/login');
    }
}