<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductList;
use App\Http\Resources\ProductListResource;
use Carbon\Carbon;
use App\Http\Payload;

class ProductListController extends Controller
{
    public function getAllProductListByStatus($status)
    {
        $productLists = ProductList::where('status',$status)->get();
         if($productLists->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(ProductListResource::collection($productLists),"Request Successfully",200);
    }

    public function saveProductList(Request $req)
    {
        $productList = new ProductList();
        $productList->fill(
            [
                'id_product_list' =>  "LIST".Carbon::now()->format('ymdhis').rand(1,1000),
                'name'=>$req->name,
                'slug'=>$req->slug,
                'photo'=>$req->photo,
                'numb'=>$req->numb,
                'description'=>$req->description,
            ]
        );
        $productList->save();
        $productList = ProductList::where('id_product_list',$productList->id_product_list)->first();
        return Payload::toJson(new ProductListResource($productList),"Create Successfully",201);
    }

    public function updateProductList(Request $req)
    {
        $result = ProductList::where('id_product_list', $req -> id_product_list)
            //Key Value // Get e by array...
            ->update(
                [
                    'name' => $req->name,
                    'slug'=>$req->slug,
                    'photo'=>$req->photo,
                    'numb'=>$req->numb,
                    'description'=>$req->description,
                ],
            );  
        if($result == 1){
            $productList = ProductList::where('id_product_list',$req->id_product_list)->first();
            return Payload::toJson(new ProductListResource($productList),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeProductList(Request $req)
    {
        $result = ProductList::where('id_product_list', $req -> id_product_list)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $productList = ProductList::where('id_product_list',$req->id_product_list)->first();
            return Payload::toJson(new ProductListResource($productList),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
