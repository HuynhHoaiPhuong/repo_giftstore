<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\PostController as ServicesPostController;

class PostController extends Controller
{
    public function postManagement($id_topic){
        $postController = new ServicesPostController();
        $data_post = $postController->getAllPostByIdTopic($id_topic);
        $posts = [];
        if($data_post['data']!=null)
        $posts = $data_post['data']->collection;
        return view('admin/topic_management/post_management',['posts'=>$posts]);
    }
}
