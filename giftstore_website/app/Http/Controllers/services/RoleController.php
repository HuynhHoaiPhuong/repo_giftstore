<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Payload;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    public function getAllRoleByStatus ($status)
    {
        $roles= Role::where('status',$status)
        ->get();
        if($roles->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(RoleResource::collection($roles),'Ok',200);
    }

    public function saveRole(Request $req)
    {
        $role = new Role();

        $role->fill([
            'id_role' => $req->id_role,
            'name'=>$req->name,
        ]);
        if($role->save()==1){
            $role=Role::where('id_role',$role->id_role)->first();
            return Payload::toJson(new RoleResource($role),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateRole (Request $req)
    {
        $role= Role::where('id_role',$req->id_role)
        ->update(['name'=>$req->name]);
        if($role==1){
            return Payload::toJson($role,'Completed',200);
        }
        return Payload::toJson($role,'Uncompleted',500);
    }
    public function removeRole (Request $req)
    {
        $role= Role::where('id_role',$req->id_role)
        ->update(['status'=>$req->status]);
        if($role==1){
            return Payload::toJson($role,'Completed',200);
        }
        return Payload::toJson($role,'Uncompleted',500);
    }
}
