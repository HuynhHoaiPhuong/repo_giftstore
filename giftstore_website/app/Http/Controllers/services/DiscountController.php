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

    public function store(Request $request)
    {
        $discounts = new Discount();
        $discounts->fill([
            'id_discount' => $request->id_discount, 
            'id_rank' => $request->id_rank, 
            'id_product_cat' => $request->id_product_cat, 
            'percent_price' => $request->payment_price, 
            'status' => $request->status
        ]);
        if($discounts->save() == 1){
            $discounts = Discount::where('id_discount', $discounts->id_discount)->first();
            return Payload::toJson(new DiscountResource($discounts), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request)
    {
        $discounts = Discount::where('id_discount', $request->id_discount)
        ->update([
            'id_rank' => $request->id_rank, 
            'id_product_cat' => $request->id_product_cat, 
            'percent_price' => $request->payment_price, 
        ]);
        if($discounts == 1){
            return Payload::toJson($discounts, 'Completed', 200);
        }
        return Payload::toJson($discounts, 'Uncompleted', 500);
    }
    public function destroy($id)
    {
        $discounts = Discount::where('id_discount', $id)->first();
        if($discounts)
        {
            $discounts = Discount::where('id_discount', $id)->delete();
            return Payload::toJson(new DiscountResource($discounts), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Deleted!", 500);
    }
}
