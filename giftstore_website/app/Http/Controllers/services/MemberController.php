<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Resources\MemberResource;
use Carbon\Carbon;
use App\Http\Payload;

class MemberController extends Controller
{
    public function getAllMember ()
    {
        $members= Member::all();
        if($members->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(MemberResource::collection($members),'Ok',200);
    }

    public function getAllMemberByStatus ($status)
    {
        $members= Member::where('status',$status)
        ->get();
        if($members->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(MemberResource::collection($members),'Ok',200);
    }

    public function getIdMemberByIdUser($id)
    {
        return $member= Member::select('id_member')->where('id_user',$id)->first();
    }

    public function saveMember(Request $req)
    {
        $member = new Member();

        $member->fill([
            'id_member' => "MB".$req->id_user.$req->id_rank,
            'id_user'=>$req->id_user,
            'id_rank'=>$req->id_rank,
        ]);
        if($member->save()==1){
            $member=Member::where('id_member',$member->id_member)->first();
            return Payload::toJson(new MemberResource($member),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateCurrentPointMember (Request $req)
    {
        $result= Member::where('id_member',$req->id_member)
        ->update(['current_point'=>$req->current_point]);
        if($result==1){
            $member = Member::where('id_member',$req->id_member)->first();
            return Payload::toJson(new MemberResource($member),'Completed',200);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function removeMember (Request $req)
    {
        $result= Member::where('id_member',$req->id_member)
        ->update(['status'=>$req->status]);
        if($result==1){
            $member = Member::where('id_member',$req->id_member)->first();
            return Payload::toJson(new MemberResource($member),'Completed',200);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
}
