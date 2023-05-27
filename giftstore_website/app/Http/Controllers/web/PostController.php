<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postManagement($id_topic){
        return view('admin/topic_management/post');
    }
}
