<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\MemberController as ServicesMemberController;

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
}