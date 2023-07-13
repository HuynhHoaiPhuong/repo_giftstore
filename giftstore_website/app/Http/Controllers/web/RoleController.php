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

    public function addRole(Request $req){
        $roleController = new ServicesRoleController();
        if($req->name==null){
            return back()->with('error','Tạo thất bại');
        }
        $result = $roleController->saveRole($req);
        if($result['data']==null){
            return back()->with('error',$result['message']);
        }
        return redirect(route('role-management'));
    }

    public function updateRole(Request $req){
        $roleController = new ServicesRoleController();

        if($req->name=='' || $req->id_role == '' || $req->id_role == null){
            return back()->with('error','Chỉnh sửa thất bại');
        }
        $result = $roleController->updateRole($req);

        if($result['data']==null){
            return back()->with('error',$result['message']);
        }
        return redirect(route('role-management'));
    }
}
