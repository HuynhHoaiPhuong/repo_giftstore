<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Http\Resources\PhotoResource;
use Carbon\Carbon;
use App\Http\Payload;

class PhotoController extends Controller
{
    public function getAllPhotoByStatus($status)
    {
        $photos = Photo::where('status',$status)->get();
         if($photos->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(PhotoResource::collection($photos),"Request Successfully",200);
    }

    public function savePhoto(Request $req)
    {
        $photo= new Photo();
        $photo->fill(
            [
                'id_photo' =>  "PHOTO".Carbon::now()->format('ymdhis').rand(1,1000),
                'name'=>$req->name,
                'link'=>$req->link,
                'photo'=>$req->photo,
                'numb'=>$req->numb,
                'act'=>$req->act,
                'type'=>$req->type
            ]
        );
        $photo->save();
        $photo = Photo::where('id_photo',$photo->id_photo)->first();
        return Payload::toJson(new PhotoResource($photo),"Create Successfully",201);
    }

    public function updatePhoto(Request $req)
    {
        $result = Photo::where('id_photo', $req -> id_photo)
            //Key Value // Get e by array...
            ->update(
                [
                    'name'=>$req->name,
                    'link'=>$req->link,
                    'photo'=>$req->photo,
                    'numb'=>$req->numb,
                    'act'=>$req->act,
                    'type'=>$req->type
                ],
            );  
        if($result == 1){
            $photo = Photo::where('id_photo',$req->id_photo)->first();
            return Payload::toJson(new PhotoResource($photo),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removePhoto(Request $req)
    {
        $result = Photo::where('id_photo', $req -> id_photo)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $photo = Photo::where('id_photo',$req->id_photo)->first();
            return Payload::toJson(new PhotoResource($photo),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
