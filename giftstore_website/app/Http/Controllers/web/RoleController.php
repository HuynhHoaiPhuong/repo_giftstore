<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\RoleController as ServicesRoleController;


class RoleController extends Controller
{
    public function roleManagement(){
        $roleController = new ServicesRoleController();
        $data_role = $roleController->getAllRole();
        $roles = [];
        if($data_role['data']!=null)
        $roles = $data_role['data']->collection;
        return view('admin/role_management/role_management', ['roles' => $roles]);
    }
}
