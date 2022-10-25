<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StaticPageResource;
use Carbon\Carbon;
use App\Http\Payload;

class StaticPageController extends Controller
{
    public function getAllProductByStatus($status)
    {
        $products = Product::where('status',$status)->get();
         if($products->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(ProductResource::collection($products),"Request Successfully",200);
    }

    public function saveProduct(Request $req)
    {
        $product= new Product();
        $product->fill(
            [
                'id_product' =>  "PRODUCT".Carbon::now()->format('ymdhis').rand(1,1000),
                'name'=>$req->name,
                'slug'=>$req->slug,
                'photo'=>$req->photo,
                'numb'=>$req->numb,
                'description'=>$req->description,
                'price'=>$req->price,
                'code'=>$req->code
            ]
        );
        $product->save();
        $product = Product::where('id_product',$product->id_product)->first();
        return Payload::toJson(new ProductResource($product),"Create Successfully",201);
    }

    public function updateProduct(Request $req)
    {
        $result = Product::where('id_product', $req -> id_product)
            //Key Value // Get e by array...
            ->update(
                [
                    'name' => $req->name,
                    'slug'=>$req->slug,
                    'photo'=>$req->photo,
                    'numb'=>$req->numb,
                    'description'=>$req->description,
                    'price'=>$req->price,
                    'code'=>$req->code
                ],
            );  
        if($result == 1){
            $product = Product::where('id_product',$req->id_product)->first();
            return Payload::toJson(new ProductResource($product),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeProduct(Request $req)
    {
        $result = Product::where('id_product', $req -> id_product)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $product = Product::where('id_product',$req->id_product)->first();
            return Payload::toJson(new ProductResource($product),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
