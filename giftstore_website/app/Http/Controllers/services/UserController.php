<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use App\Http\Payload;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUserByStatus($status)
    {
        $users = User::where('status',$status)->get();
         if($users->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(UserResource::collection($users),"Request Successfully",200);
    }

    public function saveUser(Request $req)
    {
        $users= new User();
        $users->fill(
            [
                'id_user' => "USER".Carbon::now()->format('ymdhis').rand(1,1000),
                'id_role'=>$req->id_role,
                'username'=>$req->username,
                'password'=>$req->password,
                'user_token'=>$req->user_token,
                'photo'=>$req->photo,
                'fullname'=>$req->fullname,
                'phone'=>$req->phone,
                'address'=>$req->address,
                'gender'=>$req->gender,
                'birthday'=>$req->birthday,
                'status'=>$req->status
            ]
        );
        $users->save();
        $users = User::where('id_user',$users->id_user)->first();
        return Payload::toJson(new UserResource($users),"Create Successfully",201);
    }

    public function updateUser(Request $req)
    {
        $result = User::where('id_user', $req -> id_user)
            //Key Value // Get e by array...
            ->update(
                [
                    'id_role'=>$req->id_role,
                    'username'=>$req->username,
                    'password'=>$req->password,
                    'user_token'=>$req->user_token,
                    'photo'=>$req->photo,
                    'fullname'=>$req->fullname,
                    'phone'=>$req->phone,
                    'address'=>$req->address,
                    'gender'=>$req->gender,
                    'birthday'=>$req->birthday,
                    'status'=>$req->status
                ],
            );  
        if($result == 1){
            $users = User::where('id_user',$req->id_user)->first();
            return Payload::toJson(new UserResource($users),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeUser($id)
    {
        $users = User::where('id_user',$id)->first();
        if($users)
        {
            $users = User::where('id_user',$id)->delete();
            return Payload::toJson(new UserResource($users),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Deleted!",500);
    }
}
