<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Resources\SettingResource;
use Carbon\Carbon;
use App\Http\Payload;

class SettingController extends Controller
{
    public function getAllSetting()
    {
        $settings = Setting::all();
         if($settings->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(SettingResource::collection($settings),"Request Successfully",200);
    }

    public function saveSetting(Request $req)
    {
        $setting= new Setting();
        $setting->fill(
            [
                'id_setting' =>  "SETTING".Carbon::now()->format('ymdhis').rand(1,1000),
                'name'=>$req->name,
                'address'=>$req->address,
                'email'=>$req->email,
                'hotline'=>$req->hotline,
                'phone'=>$req->phone
            ]
        );
        $setting->save();
        $setting = Setting::where('id_setting',$setting->id_setting)->first();
        return Payload::toJson(new SettingResource($setting),"Create Successfully",201);
    }

    public function updateSetting(Request $req)
    {
        $result = Setting::where('id_setting', $req -> id_setting)
            //Key Value // Get e by array...
            ->update(
                [
                    'name'=>$req->name,
                    'address'=>$req->address,
                    'email'=>$req->email,
                    'hotline'=>$req->hotline,
                    'phone'=>$req->phone
                ],
            );  
        if($result == 1){
            $setting = Setting::where('id_setting',$req->id_setting)->first();
            return Payload::toJson(new SettingResource($setting),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeSetting(Request $req)
    {
        $result = Setting::where('id_setting', $req -> id_setting)
             ->delete();
        if($result == 1)
        {
            return Payload::toJson(true,"Remove Successfully",202);
        }
        return Payload::toJson(false,"Remove Uncomleted",500);
    }
}
