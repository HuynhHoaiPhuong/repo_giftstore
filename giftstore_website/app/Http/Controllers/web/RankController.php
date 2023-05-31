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
}