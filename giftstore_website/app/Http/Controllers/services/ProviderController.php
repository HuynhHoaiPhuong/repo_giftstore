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
        return Payload::toJson(ProviderResource::collection($providers), 'Ok', 200);
    }

    public function store(Request $request){
        $providers = new Provider();
        $providers->fill([
            'id_provider' => "PROVIDER".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'name' => $request->name, 
            'address' => $request->address, 
            'phone' => $request->phone, 
            'email' => $request->email, 
        ]);

        if($providers->save() == 1){
            $providers = Provider::where('id_provider', $providers->id_provider)->first();
            return Payload::toJson(new ProviderResource($providers), 'Completed', 201);
        }

        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request){
        $providers = Provider::where('id_provider', $request->id_provider)
        ->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        if($providers == 1){
            return Payload::toJson($providers, 'Completed', 200);
        }

        return Payload::toJson($providers, 'Uncompleted', 500);
    }
    public function destroy(Request $request){
        $result = Provider::where('id_provider', $request->id_provider)
        ->update(['status'=> $request -> status]);
        
        if($result == 1){
            $providers = Provider::where('id_provider',$request->id_provider)->first();
            return Payload::toJson(new ProviderResource($providers),"Remove Successfully",202);
        }

        return Payload::toJson(null,"Cannot Update",500);
    }
}
