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

    public function addRank(Request $request){
        $rankController = new ServicesRankController();
        if($request->rank_name == null || $request->score_level == null){
            return back()->withErrors('error','Tạo thất bại');
        }
        $result = $rankController->saveRank($request);
        if($result==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        return redirect(route('rank-management'));
    }

    public function updateRank(Request $request){
        $rankController = new ServicesRankController();
        $result = $rankController->updateRank($request);
        if($result==null){
            return back()->withErrors('error','Chỉnh sửa thất bại');
        }
        return redirect(route('rank-management'));
    }

    public function recycleRank(){
        $rankController = new ServicesRankController();
        $data_rank = $rankController->getAllRankByStatus('disabled');
        $ranks = [];
        if($data_rank['data'] != null)
        $ranks = $data_rank['data']->collection;
        return view('admin/rank_management/recycle_rank',['ranks'=>$ranks]);
    }
}