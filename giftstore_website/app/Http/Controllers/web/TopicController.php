<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\TopicController as ServicesTopicController;

class TopicController extends Controller
{
    public function topicManagement(){
        $topicController = new ServicesTopicController();
        $data_topic = $topicController->getAllTopic();
        $topics = [];
        if($data_topic['data']!=null)
        $topics = $data_topic['data']->collection;
        return view('admin/topic_management/topic_management',['topics'=>$topics]);
    }
}
