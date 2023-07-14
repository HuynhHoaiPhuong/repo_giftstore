<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\MemberController as ServicesMemberController;
use App\Http\Controllers\services\UserController as ServicesUserController;

class MemberController extends Controller
{
    public function memberManagement(){
        $memberController = new ServicesMemberController();
        $data_member = $memberController->getAllMember();
        $members = [];
        if($data_member['data']!=null)
        $members = $data_member['data']->collection;
        return view('admin/member_management/member_management',['members'=>$members]);
    }

    public function addMember(Request $req){
        $memberController = new ServicesMemberController();
        $userController = new ServicesUserController();
        $reqUser = new Request([
            'username'=>$req->username,
            'password'=>$req->password,
            'fullname'=>$req->fullname,
            'id_role'=> 'MB',
            'phone'=>$req->phone,
            'address'=>$req->address,
        ]);
        $data_user = $userController->saveUser($reqUser);
        $user = [];
        if($data_user['data']!=null)
            $user = $data_user['data'];
        else
            return back()->with('error', $data_user['message']);
        
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
            return back()->with('error', $data_member['message']);

        return redirect()->route('member-management')->with('error', 'Tạo tài khoản thành công!');
    }
}