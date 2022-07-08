<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function allRank(){
        return view('admin.all_rank');
    }
    public function addRank(){
        return view('admin.add_rank');
    }
}