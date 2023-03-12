<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producer;
use App\Http\Payload;
use App\Http\Resources\ProducerResource;

class ProducerController extends Controller
{
    public function getAllProducerByStatus ($status)
    {
        $producers = Producer::where('status',$status)->get();
        if($producers->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(ProducerResource::collection($producers),'Ok',200);
    }

    public function saveProducer(Request $req)
    {
        $producers = new Producer();
        $producers->fill([
            'id_producer' => $req->id_producer,
            'name'=>$req->name,
            'address'=>$req->address,
            'phone'=>$req->phone,
            'email'=>$req->email,
            'status'=>$req->status
        ]);
        if($producers->save()==1){
            $producers = Producer::where('id_producer', $producers->id_producer)->first();
            return Payload::toJson(new ProducerResource($producers),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateProducer (Request $req)
    {
        $producers= Producer::where('id_producer',$req->id_producer)
        ->update(['name'=>$req->name]);
        if($producers == 1){
            return Payload::toJson($producers,'Completed',200);
        }
        return Payload::toJson($producers,'Uncompleted',500);
    }
    public function removeProducer($id)
    {
        $producers = Producer::where('id_producer',$id)->first();
        if($producers)
        {
            $producers = Producer::where('id_producer',$id)->delete();
            return Payload::toJson(new ProducerResource($producers),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Deleted!",500);
    }
}
