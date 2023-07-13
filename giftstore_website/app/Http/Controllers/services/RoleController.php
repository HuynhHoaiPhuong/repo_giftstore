<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Payload;
use Carbon\Carbon;

class RoleController extends Controller
{
    public function getAllRole()
    {
        $roles = Role::all();
        if($roles->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(RoleResource::collection($roles), 'Request Successfully', 200);
    }
    public function getRoleByIdRole($id_role)
    {
        $role = Role::where('id_role',$id_role)->first();
        if(!$role){
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(new RoleResource($role),'Ok',200);
    }
    public function getAllRoleByStatus($status)
    {
        $roles = Role::where('status',$status)->get();
        if($roles->isEmpty()){
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(RoleResource::collection($roles),'Ok',200);
    }

    public function saveRole(Request $request)
    {
        $role = new Role();
        $role->fill([
            'id_role' => $request->id_role, 
            'name' => $request->name,
        ]);
        $checkName = Role::where('name', $role->name)->orWhere('id_role', $role->id_role)->first();
        if($checkName) return Payload::toJson(null,'Tên hoặc Id quyền này đã tồn tại!',500);
        if($role->save() == 1){
            $role = Role::where('id_role',$role->id_role)->first();
            return Payload::toJson(new RoleResource($role),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateRole(Request $request)
    {
        $checkName = Role::where('name', $request->name)->where('id_role', '!=', $request->id_role)->first();
        if($checkName) return Payload::toJson(null,'Tên nhóm quyền không được trùng lặp!',500);
        $result = Role::where('id_role',$request->id_role)
        ->update(['name' => $request->name]);
        if($result == 1){
            $role = Role::where('id_role', $request->id_role)->first();
            return Payload::toJson(new RoleResource($role),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function removeRole(Request $request)
    {
        $result = Role::where('id_role', $request->id_role)
        ->update(['status'=>$request->status]);
        if($result == 1){
            $role = Role::where('id_role',$request->id_role)->first();
            return Payload::toJson(new RoleResource($role),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function deleteRole(Request $req)
    {
        if($req->id_role){
            $result = Role::where('id_role', $req->id_role)->delete();
            if($result) return Payload::toJson(true, "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Deleted!", 500);
    }
}
