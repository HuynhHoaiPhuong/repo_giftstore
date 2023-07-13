<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\RankController as ServicesRankController;


class RankController extends Controller
{
    public function rankManagement(){
        $rankController = new ServicesRankController();
        $data_rank = $rankController->getAllRank();
        $ranks = [];
        if($data_rank['data']!=null)
        $ranks = $data_rank['data']->collection;
        return view('admin/rank_management/rank_management', ['ranks' => $ranks]);
    }

    public function updateRank(Request $req){
        if(!$req->id_rank){
            return back()->with('error','Chỉnh sửa thất bại');
        }
        $rankController = new ServicesRankController();

        $result = $rankController->updateRank($req);

        if($result==null){
            return back()->with('error','Chỉnh sửa thất bại');
        }
        return redirect(route('rank-management'))->with('success','Cập nhật thành công!');
    }
}