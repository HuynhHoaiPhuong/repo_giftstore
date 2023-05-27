<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function topicManagement(){
        return view('admin/topic_management/topic');
    }
}
