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
    public function getAllProduct()
    {
        $products = Product::all();
        if($products->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(ProductResource::collection($products), 'Request Successfully', 200);
    }
    public function getAllProductByStatus($status){
        $products = Product::where('status', $status)->get();
         if($products->isEmpty())
         {
            return Payload::toJson(null, "Data Not Found", 404); 
         }  
        return Payload::toJson(ProductResource::collection($products), "OK", 200);
    }

    public function saveProduct(Request $request){
        $product = new Product();
        $product->fill([
            'id_product' => "PRODUCT".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_category' => $request->id_category, 
            'id_provider' => $request->id_provider, 
            // 'numerical_order' => $request->numerical_order, 
            'name' => $request->name, 
            'photo' => $request->photo, 
            'price' => $request->price, 
            'slug' => $request->slug,
        ]);
        if($product->save() == 1){
            $product = Product::where('id_product', $product->id_product)->first();
            return Payload::toJson(new ProductResource($product), "Completed", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateProduct(Request $request)
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
            $product = Product::where('id_product', $request->id_product)->first();
            return Payload::toJson(new ProductResource($product), "Completed", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function removeProduct(Request $request){
        $result = Product::where('id_product', $request->id_product)
        ->update(['status' => $request->status]);
        if($result == 1){
            $product = Product::where('id_product', $request->id_product)->first();
            return Payload::toJson(new ProductResource($product), "Completed", 201);
        }
        return Payload::toJson(null,'Uncompleted', 500);
    }
}
