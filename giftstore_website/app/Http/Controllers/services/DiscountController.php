<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Http\Payload;
use App\Http\Resources\DiscountResource;

class DiscountController extends Controller
{
    public function getAllDiscountByStatus ($status)
    {
        $discounts = Discount::where('status',$status)->get();
        if($discounts->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(DiscountResource::collection($discounts),'Ok',200);
    }

    public function saveDiscount(Request $req)
    {
        $discounts = new Discount();
        $discounts->fill([
            'id_discount' => $req->id_discount,
            'id_rank'=>$req->id_rank,
            'id_cat'=>$req->id_cat,
            'payment_price'=>$req->payment_price,
            'status'=>$req->status
        ]);
        if($discounts->save()==1){
            $discounts = Discount::where('id_discount', $discounts->id_discount)->first();
            return Payload::toJson(new DiscountResource($discounts),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateDiscount (Request $req)
    {
        $discounts= Discount::where('id_discount',$req->id_discount)
        ->update(['name'=>$req->name]);
        if($discounts == 1){
            return Payload::toJson($discounts,'Completed',200);
        }
        return Payload::toJson($discounts,'Uncompleted',500);
    }
    public function removeDiscount($id)
    {
        $discounts = Discount::where('id_discount',$id)->first();
        if($discounts)
        {
            $discounts = Discount::where('id_discount',$id)->delete();
            return Payload::toJson(new DiscountResource($discounts),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Deleted!",500);
    }
}
