<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function rankManagement(){
        return view('admin/rank_management/rank_management');
    }
}