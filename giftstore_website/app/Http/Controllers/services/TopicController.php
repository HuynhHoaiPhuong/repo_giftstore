<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Resources\TopicResource;
use Carbon\Carbon;
use App\Http\Payload;

class TopicController extends Controller
{
    public function getAllTopicByStatus($status)
    {
        $topics = Topic::where('status',$status)->get();
         if($topics->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(TopicResource::collection($topics),"Request Successfully",200);
    }

    public function saveTopic(Request $req)
    {
        $topic= new Topic();
        $topic->fill(
            [
                'id_topic' =>  "Topic".Carbon::now()->format('ymdhis').rand(1,1000),
                'name'=>$req->name,
                'photo'=>$req->photo,
                'slug'=>$req->slug,
            ]
        );
        $topic->save();
        $topic = Topic::where('id_topic',$topic->id_topic)->first();
        return Payload::toJson(new TopicResource($topic),"Create Successfully",201);
    }

    public function updateTopic(Request $req)
    {
        $result = Topic::where('id_topic', $req -> id_topic)
            //Key Value // Get e by array...
            ->update(
                [
                    'name'=>$req->name,
                    'photo'=>$req->photo,
                    'slug'=>$req->slug,
                ],
            );  
        if($result == 1){
            $topic = Topic::where('id_topic',$req->id_topic)->first();
            return Payload::toJson(new TopicResource($topic),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeTopic(Request $req)
    {
        $result = Topic::where('id_topic', $req -> id_topic)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $topic = Topic::where('id_topic',$req->id_topic)->first();
            return Payload::toJson(new TopicResource($topic),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
