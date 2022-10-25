<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SettingResource;
use Carbon\Carbon;
use App\Http\Payload;

class SettingController extends Controller
{
    public function getAllSettingByStatus($status)
    {
        $settings = Setting::all()->get();
         if($settings->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(SettingResource::collection($settings),"Request Successfully",200);
    }

    public function saveSetting(Request $req)
    {
        $product= new Setting();
        $product->fill(
            [
                'id_product' =>  "PRODUCT".Carbon::now()->format('ymdhis').rand(1,1000),
                'name'=>$req->name,
                'slug'=>$req->slug,
                'photo'=>$req->photo,
                'numb'=>$req->numb,
                'description'=>$req->description,
                'price'=>$req->price,
                'code'=>$req->code
            ]
        );
        $product->save();
        $product = Setting::where('id_product',$product->id_product)->first();
        return Payload::toJson(new SettingResource($product),"Create Successfully",201);
    }

    public function updateSetting(Request $req)
    {
        $result = Setting::where('id_product', $req -> id_product)
            //Key Value // Get e by array...
            ->update(
                [
                    'name' => $req->name,
                    'slug'=>$req->slug,
                    'photo'=>$req->photo,
                    'numb'=>$req->numb,
                    'description'=>$req->description,
                    'price'=>$req->price,
                    'code'=>$req->code
                ],
            );  
        if($result == 1){
            $product = Setting::where('id_product',$req->id_product)->first();
            return Payload::toJson(new SettingResource($product),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeSetting(Request $req)
    {
        $result = Setting::where('id_product', $req -> id_product)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $product = Setting::where('id_product',$req->id_product)->first();
            return Payload::toJson(new SettingResource($product),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
