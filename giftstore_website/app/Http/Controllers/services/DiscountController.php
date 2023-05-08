<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Http\Payload;
use App\Http\Resources\DiscountResource;

class DiscountController extends Controller
{
    public function getAllDiscountByStatus($status)
    {
        $discounts = Discount::where('status', $status)->get();
        if($discounts->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(DiscountResource::collection($discounts), 'Ok', 200);
    }

    public function saveDiscount(Request $request)
    {
        $discounts = new Discount();
        $discounts->fill([
            'id_discount' => $request->id_discount, 
            'id_rank' => $request->id_rank, 
            'id_category' => $request->id_category, 
            'percent_price' => $request->percent_price, 
        ]);
        if($discounts->save() == 1){
            $discounts = Discount::where('id_discount', $discounts->id_discount)->first();
            return Payload::toJson(new DiscountResource($discounts), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function updateDiscount(Request $request)
    {
        $discounts = Discount::where('id_discount', $request->id_discount)
        ->update([
            'id_rank' => $request->id_rank, 
            'id_product_cat' => $request->id_product_cat, 
            'percent_price' => $request->percent_price, 
        ]);
        if($result == 1){
            $discounts = Discount::where('id_discount',$req->id_discount)->first();
            return Payload::toJson(new VoucherResource($discounts),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
    public function removeDiscount(Request $req)
    {
        $result = Discount::where('id_discount', $req -> id_discount)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $discount = Discount::where('id_discount',$req->id_discount)->first();
            return Payload::toJson(new DiscountResource($discount),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
