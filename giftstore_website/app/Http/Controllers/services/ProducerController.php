<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producer;
use App\Http\Payload;
use App\Http\Resources\ProducerResource;

class ProducerController extends Controller
{
    public function getAllProducerByStatus($status)
    {
        $producers = Producer::where('status', $status)->get();
        if($producers->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(ProducerResource::collection($producers), 'Ok', 200);
    }

    public function store(Request $request)
    {
        $producers = new Producer();
        $producers->fill([
            'id_producer' => $request->id_producer, 
            'name' => $request->name, 
            'address' => $request->address, 
            'phone' => $request->phone, 
            'email' => $request->email, 
        ]);
        if($producers->save() == 1){
            $producers = Producer::where('id_producer', $producers->id_producer)->first();
            return Payload::toJson(new ProducerResource($producers), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request)
    {
        $producers = Producer::where('id_producer', $request->id_producer)
        ->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        if($producers == 1){
            return Payload::toJson($producers, 'Completed', 200);
        }
        return Payload::toJson($producers, 'Uncompleted', 500);
    }
    public function destroy(Request $request)
    {
        $result = Producer::where('id_producer', $request->id_producer)
        ->update(['status'=> $request -> status]);
        if($result == 1)
        {
            $producers = Producer::where('id_producer',$request->id_producer)->first();
            return Payload::toJson(new ProducerResource($producers),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
