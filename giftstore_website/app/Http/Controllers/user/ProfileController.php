<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Controllers\services\MemberController as ServicesMemberController;

class ProfileController extends Controller
{
    public function index(){
        // $memberController = new ServicesMemberController();
        // $data_member = $memberController->getAllWarehouseDetailByStatus('enabled');
        return view('user.templates.profile');
    }
}
