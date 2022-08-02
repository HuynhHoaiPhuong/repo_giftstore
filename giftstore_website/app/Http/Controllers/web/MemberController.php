<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
session_start();

class MemberController extends Controller
{
    public function addMember(){
        $user = DB::table('tbl_user')->orderby('id','desc')->get();
        $rank = DB::table('tbl_rank')->orderby('id','desc')->get();
        return view('admin.member_management.add_member')->with('user',$user)->with('rank',$rank);
        
    }

    public function allMember(){
        $all_member = DB::table('tbl_member')
        ->join('tbl_user','tbl_user.id','=','tbl_member.id_user')
        ->join('tbl_rank','tbl_rank.id','=','tbl_member.id_rank')->orderby('tbl_member.id','desc')->get();
        
        $manager_member = view('admin.member_management.all_member')->with('all_member', $all_member); 
        return view('admin_layout')->with('admin.member_management.all_member',$manager_member); 
          
    }
    public function saveMember(Request $request){
        $datenow = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s');
        $data = array();
        $data['id'] = $request->id_user.$request->id_rank.$datenow;
        $data['id_user'] = $request->id_user;
        $data['id_rank'] = $request->id_rank;
        $data['current_point'] = $request->point;
        $data['date_created'] = $datenow;
        $data['date_updated'] = $datenow;
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
        $user = DB::table('tbl_user')->orderby('id','desc')->get();
        $rank = DB::table('tbl_rank')->orderby('id','desc')->get();
        $edit_member = DB::table('tbl_member')->where('id',$id)->get();
        $manager_member = view('admin.member_management.edit_member')
        ->with('edit_member',$edit_member)
        ->with('user',$user)
        ->with('rank',$rank); 

        return view('admin_layout')->with('admin.member_management.edit_member', $manager_member);
        
    }
    public function updateMember(Request $request, $id){
        $datenow = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s');
        $data = array();
        $data['current_point'] = $request->point;
        // $data['date_created'] = $request->date_created;
        $data['date_updated'] = $datenow;
        $data['status'] = $request->status;
        DB::table('tbl_member')->where('id',$id)->update($data); 
        return redirect('admin/all-member');
    }

    public function delMember($id){
        DB::table('tbl_member')->where('id',$id)->delete();
        return redirect('admin/all-member');
    
    }
}