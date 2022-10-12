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
}
