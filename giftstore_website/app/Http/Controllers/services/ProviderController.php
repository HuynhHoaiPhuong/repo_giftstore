<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Http\Resources\ProviderResource;
use App\Http\Payload;
use Carbon\Carbon;

class ProviderController extends Controller
{
    public function getAllProviderByStatus($status){
        $providers = Provider::where('status', $status)->get();
        if($providers->isEmpty()){
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(ProviderResource::collection($providers), 'OK', 200);
    }

    public function saveProvider(Request $request){
        $provider = new Provider();
        $provider->fill([
            'id_provider' => "PROVIDER".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'name' => $request->name, 
            'address' => $request->address, 
            'phone' => $request->phone, 
            'email' => $request->email, 
        ]);
        if($provider->save() == 1){
            $provider = Provider::where('id_provider', $provider->id_provider)->first();
            return Payload::toJson(new ProviderResource($provider), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function updateProvider(Request $request){
        $result = Provider::where('id_provider', $request->id_provider)
        ->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        if($result == 1){
            $provider = Provider::where('id_provider',$request->id_provider)->first();
            return Payload::toJson(new ProviderResource($provider),"Completed",201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function removeProvider(Request $request){
        $result = Provider::where('id_provider', $request->id_provider)
        ->update(['status'=> $request -> status]);
        if($result == 1){
            $provider = Provider::where('id_provider',$request->id_provider)->first();
            return Payload::toJson(new ProviderResource($provider),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
