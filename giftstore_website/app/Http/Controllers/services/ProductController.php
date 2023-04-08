<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Payload;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function getAllProductByStatus($status){
        $products = Product::where('status', $status)->get();
         if($products->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   

        return Payload::toJson(ProductResource::collection($products), "Request Successfully", 200);
    }

    public function store(Request $request){
        $products = new Product();
        $products->fill([
            'id_product' => "PRODUCT".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_category' => $request->id_category, 
            'id_provider' => $request->id_provider, 
            'numerical_order' => $request->numerical_order, 
            'name' => $request->name, 
            'code' => $request->code, 
            'photo' => $request->photo, 
            'price' => $request->price, 
            'slug' => $request->slug,
        ]);
        $products->save();
        $products = Product::where('id_product', $products->id_product)->first();
        return Payload::toJson(new ProductResource($products), "Create Successfully", 201);
    }

    public function update(Request $request)
    {
        $result = Product::where('id_product', $request->id_product)
        ->update([
            'id_category' => $request->id_category, 
            'id_provider' => $request->id_provider, 
            'numerical_order' => $request->numerical_order, 
            'name' => $request->name, 
            'code' => $request->code, 
            'photo' => $request->photo, 
            'price' => $request->price, 
            'slug' => $request->slug, 
        ]);  

        if($result == 1){
            $products = Product::where('id_product', $request->id_product)->first();
            return Payload::toJson(new ProductResource($products), "Update Successfully", 202);
        }

        return Payload::toJson(null, "Cannot Update", 500);
    }

    public function destroy(Request $request){
        $result = Product::where('id_product', $request->id_product)
        ->update(['status' => $request->status]);

        if($result == 1){
            $products = Product::where('id_product', $request->id_product)->first();
            return Payload::toJson(new ProductResource($products), "Remove Successfully", 202);
        }

        return Payload::toJson(null, "Cannot Update", 500);
    }
}
