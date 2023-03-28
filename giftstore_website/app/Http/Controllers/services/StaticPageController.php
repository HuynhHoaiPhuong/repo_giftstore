<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaticPage;
use App\Http\Resources\StaticPageResource;
use Carbon\Carbon;
use App\Http\Payload;

class StaticPageController extends Controller
{
    public function getAllStaticByStatus($status)
    {
        $statics = StaticPage::where('status',$status)->get();
         if($statics->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(StaticPageResource::collection($statics),"Request Successfully",200);
    }

    public function saveStatic(Request $req)
    {
        $static= new StaticPage();
        $static->fill(
            [
                'id_static' =>  "STC".Carbon::now()->format('ymdhis').rand(1,1000),
                'name'=>$req->name,
                'slug'=>$req->slug,
                'photo'=>$req->photo,
                'numb'=>$req->numb,
                'description'=>$req->description,
                'content'=>$req->content,
                'type'=>$req->type
            ]
        );
        $static->save();
        $static = StaticPage::where('id_static',$static->id_static)->first();
        return Payload::toJson(new StaticPageResource($static),"Create Successfully",201);
    }

    public function updateStatic(Request $req)
    {
        $result = StaticPage::where('id_static', $req -> id_static)
            //Key Value // Get e by array...
            ->update(
                [
                    'name'=>$req->name,
                    'slug'=>$req->slug,
                    'photo'=>$req->photo,
                    'numb'=>$req->numb,
                    'description'=>$req->description,
                    'content'=>$req->content,
                    'type'=>$req->type
                ],
            );  
        if($result == 1){
            $static = StaticPage::where('id_static',$req->id_static)->first();
            return Payload::toJson(new StaticPageResource($static),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeStatic(Request $req)
    {
        $result = StaticPage::where('id_static', $req -> id_static)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $static = StaticPage::where('id_static',$req->id_static)->first();
            return Payload::toJson(new StaticPageResource($static),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
