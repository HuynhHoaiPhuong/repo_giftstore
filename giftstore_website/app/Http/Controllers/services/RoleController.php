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
            'id_role' => "ROLE".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'name' => $request->name,
        ]);
        if($role->save() == 1){
            $role = Role::where('id_role',$role->id_role)->first();
            return Payload::toJson(new RoleResource($role),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateRole(Request $request)
    {
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
}
