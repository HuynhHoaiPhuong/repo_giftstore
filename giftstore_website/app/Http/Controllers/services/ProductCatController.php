<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCat;
use App\Http\Resources\ProductCatResource;
use Carbon\Carbon;
use App\Http\Payload;

class ProductCatController extends Controller
{
    public function getAllProductCatByStatus($status)
    {
        $productCats = ProductCat::where('status',$status)->get();
         if($productCats->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(ProductCatResource::collection($productCats),"Request Successfully",200);
    }

    public function saveProductCat(Request $req)
    {
        $productCat = new ProductCat();
        $productCat->fill(
            [
                'id_product_cat' =>  "CAT".Carbon::now()->format('ymdhis').rand(1,1000),
                'id_product_list'=>$req->id_product_list,
                'name'=>$req->name,
                'slug'=>$req->slug,
                'photo'=>$req->photo,
                'numb'=>$req->numb,
                'description'=>$req->description,
            ]
        );
        $productCat->save();
        $productCat = ProductCat::where('id_product_cat',$productCat->id_product_cat)->first();
        return Payload::toJson(new ProductCatResource($productCat),"Create Successfully",201);
    }

    public function updateProductCat(Request $req)
    {
        $result = ProductCat::where('id_product_cat', $req -> id_product_cat)
            //Key Value // Get e by array...
            ->update(
                [
                    'id_product_list'=>$req->id_product_list,
                    'name' => $req->name,
                    'slug'=>$req->slug,
                    'photo'=>$req->photo,
                    'numb'=>$req->numb,
                    'description'=>$req->description,
                ],
            );  
        if($result == 1){
            $productCat = ProductCat::where('id_product_cat',$req->id_product_cat)->first();
            return Payload::toJson(new ProductCatResource($productCat),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeProductCat(Request $req)
    {
        $result = ProductCat::where('id_product_cat', $req -> id_product_cat)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $productCat = ProductCat::where('id_product_cat',$req->id_product_cat)->first();
            return Payload::toJson(new ProductCatResource($productCat),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
