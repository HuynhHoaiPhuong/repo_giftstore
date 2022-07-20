<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
session_start();

class RankController extends Controller
{
    public function allRank(){
        $all_rank = DB::table('tbl_rank')->get();
        $manager_rank = view('admin.rank_management.all_rank')
        ->with('all_rank', $all_rank); 
        return view('admin_layout')->with('admin.rank_management.all_rank',$manager_rank);
    }

    public function addRank(){
        return view('admin.rank_management.add_rank');
    }
    public function saveRank(Request $request){
        $datenow = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s');
        $data = array();
        $data['id'] = $datenow;
        $data['name'] = $request->name;
        $data['point'] = $request->point;
        $data['date_created'] = $request->date_created;
        $data['date_updated'] = $datenow;
        $data['status'] = $request->status;
        DB::table('tbl_rank')->insert($data); 
        return redirect('admin/add-rank');
    }
    
    public function unActiveRank($id){
        DB::table('tbl_rank')->where('id', $id)->update(['status' => 'an']);
        return redirect('admin/all-rank');
    }
    public function activeRank($id){
        DB::table('tbl_rank')->where('id', $id)->update(['status' => 'hienthi']);
        return redirect('admin/all-rank');
    }

    public function editRank($id){
        $edit_rank = DB::table('tbl_rank')->where('id',$id)->get();
        $manager_rank = view('admin.rank_management.edit_rank')->with('edit_rank',$edit_rank); 
        return view('admin_layout')->with('admin.rank_management.edit_rank', $manager_rank);
    }
    public function updateRank(Request $request, $id){
        $datenow = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s');
        $data = array();
        $data['name'] = $request->name;
        $data['point'] = $request->point;
        $data['date_created'] = $request->date_created;
        $data['date_updated'] = $datenow;
        $data['status'] = $request->status;
        DB::table('tbl_rank')->where('id',$id)->update($data); 
        return redirect('admin/all-rank');
    }

    public function delRank($id){
        DB::table('tbl_rank')->where('id',$id)->delete();
        return redirect('admin/all-rank');
    }
}