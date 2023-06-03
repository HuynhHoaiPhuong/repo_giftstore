<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use Carbon\Carbon;
use App\Http\Payload;

class PostController extends Controller
{
    public function getAllPostByIdTopic($id_topic)
    {
        $posts = Post::where('id_topic',$id_topic)->get();
         if($posts->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(PostResource::collection($posts),"Request Successfully",200);
    }

    public function getAllPostByStatus($status)
    {
        $posts = Post::where('status',$status)->get();
         if($posts->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(PostResource::collection($posts),"Request Successfully",200);
    }

    public function savePost(Request $req)
    {
        $post= new Post();
        $post->fill(
            [
                'id_post' =>  "Post".Carbon::now()->format('ymdhis').rand(1,1000),
                'id_topic'=>$req->id_topic,
                'name'=>$req->name,
                'photo'=>$req->photo,
                'slug'=>$req->slug,
                'description'=>$req->description,
                'content'=>$req->content,
            ]
        );
        $post->save();
        $post = Post::where('id_post',$post->id_post)->first();
        return Payload::toJson(new PostResource($post),"Create Successfully",201);
    }

    public function updatePost(Request $req)
    {
        $result = Post::where('id_post', $req -> id_post)
            //Key Value // Get e by array...
            ->update(
                [
                    'id_topic'=>$req->id_topic,
                    'name'=>$req->name,
                    'photo'=>$req->photo,
                    'slug'=>$req->slug,
                    'description'=>$req->description,
                    'content'=>$req->content,
                ],
            );  
        if($result == 1){
            $post = Post::where('id_post',$req->id_post)->first();
            return Payload::toJson(new PostResource($post),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removePost(Request $req)
    {
        $result = Post::where('id_post', $req -> id_post)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $post = Post::where('id_post',$req->id_post)->first();
            return Payload::toJson(new PostResource($post),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
