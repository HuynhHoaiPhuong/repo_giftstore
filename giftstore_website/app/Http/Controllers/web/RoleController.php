<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function roleManagement(){
        return view('admin/role_management/role_management');
    }
}
