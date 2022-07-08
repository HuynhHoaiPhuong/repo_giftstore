<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class MemberController extends Controller
{
    public function addMember(){
        $user = DB::table('tbl_user')->orderby('id','desc')->get();
        $rank = DB::table('tbl_rank')->orderby('id','desc')->get();
        return view('admin.add_member')->with('user',$user)->with('rank',$rank);
        
    }

    public function allMember(){
        $all_member = DB::table('tbl_member')
        ->join('tbl_user','tbl_user.id','=','tbl_member.id_user')
        ->join('tbl_rank','tbl_rank.id','=','tbl_member.id_rank')
        ->orderby('tbl_member.id','desc')->get();
        $manager_member = view('admin.all_member')->with('all_member', $all_member); 
        return view('admin_layout')->with('admin.all_member',$manager_member); 
          
    }
    public function saveMember(Request $request){
        $data = array();
        $data['id'] = $request->id;
        $data['id_user'] = $request->id_user;
        $data['id_rank'] = $request->id_rank;
        $data['point'] = $request->point;
        $data['status'] = $request->status;
        DB::table('tbl_member')->insert($data); 
        return redirect('admin/add-member');

    }
    public function unActiveMember($id){
        DB::table('tbl_member')->where('id', $id)->update(['status' => 'an']);
        return redirect('admin/all-member');

    }
    public function activeMember($id){
        DB::table('tbl_member')->where('id', $id)->update(['status' => 'hienthi']);
        return redirect('admin/all-member');

    }
    public function editMember($id){
        $member = DB::table('tbl_member')->orderby('id','desc')->get();
        $edit_member = DB::table('tbl_member')->where('id',$id)->get();
        $manager_member = view('admin.edit_member')->with('edit_member',$edit_member)->with('id',$member); 
        return view('admin_layout')->with('admin.edit_bill', $manager_member);
        
    }
    public function updateMember(Request $request, $id){
        $data = array();
        $data['id'] = $request->id;
        $data['id_user'] = $request->id_user;
        $data['id_rank'] = $request->id_rank;
        $data['point'] = $request->point;
        $data['status'] = $request->status;
        DB::table('tbl_member')->where('id',$id)->update($data); 
        return redirect('admin/all-member');

    }

    public function delMember($id){
        DB::table('tbl_member')->where('id',$id)->delete();
        return redirect('admin/all-member');
    
    }
}