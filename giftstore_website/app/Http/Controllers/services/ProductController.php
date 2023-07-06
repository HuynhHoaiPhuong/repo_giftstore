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
    public function getProductByIdProduct($id_product){
        $product = Product::where('id_product', $id_product)->first();
         if(!$product)
         {
            return Payload::toJson(null, "Data Not Found", 404); 
         }  
        return Payload::toJson(new ProductResource($product), "OK", 200);
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
            'description' => $request->description,
        ]);
        $checkName = Product::where('name', $product->name)->first();
        if($checkName) return Payload::toJson(null,'Duplicate product name!',500);
        if($product->save() == 1){
            $product = Product::where('id_product', $product->id_product)->first();
            return Payload::toJson(new ProductResource($product), "Completed", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateProduct(Request $request)
    {
        $checkName = Product::where('name', $request->name)->where('id_product', '!=', $request->id_product)->first();
        if($checkName) return Payload::toJson(null,'Duplicate product name!',500);
        $result = Product::where('id_product', $request->id_product)
        ->update([
            'id_category' => $request->id_category, 
            'id_provider' => $request->id_provider, 
            // 'numerical_order' => $request->numerical_order, 
            'name' => $request->name, 
            'photo' => $request->photo, 
            'price' => $request->price, 
            'slug' => $request->slug,
            'description' => $request->description,
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

    public function deleteProduct(Request $req)
    {
        if($req->id_product){
            $product = Product::where('id_product', $req->id_product)->first();
            if(file_exists('upload/product/'.$product->photo)){
                unlink('upload/product/'.$product->photo);
                $result = Product::where('id_product', $req->id_product)->delete();
                if($result) return Payload::toJson(true, "Remove Successfully", 202);
            }
            else return Payload::toJson(false, "Cannot Deleted!", 500);
        }
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }

    public function clearProduct(Request $req)
    {
        $products = Product::where('status', 'disabled')->get();
        foreach($products as $v){
            if(file_exists('upload/product/'.$v->photo)){
                unlink('upload/product/'.$v->photo);
            }
            else return back()->withErrors('error','Xóa ảnh thất bại');
        }
        $result = Product::where('status', 'disabled')->delete();
        if($result) return Payload::toJson(true, "Remove Successfully", 202);
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }
}
