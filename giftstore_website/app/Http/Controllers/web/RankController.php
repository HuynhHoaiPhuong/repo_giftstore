<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function allRank(){
        return view('admin.rank_management.all_rank');
    }
    public function addRank(){
        return view('admin.rank_management.add_rank');
    }
}