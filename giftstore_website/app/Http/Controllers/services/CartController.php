<?php

namespace App\Http\Controllers\services;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Payload;
use App\Models\Cart;
use App\Models\Member;
use App\Http\Resources\CartResource;

class CartController extends Controller
{
    public function getAllCartByIdMember($id)
    {
        $carts = Cart::where('member_id',$id)->get();
        if($carts->isEmpty()){
            return Payload::toJson(null,"Data Not Found",404);
        }
        return Payload::toJson(CartResource::collection($carts),"Request Successfully",200);
    }
    public function saveCart(Request $req){
        $cart = new Cart();
        $datenow = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s');
        $cart->fill(
            [
                'id_cart' => $req -> id_product . $req -> id_member . $datenow,
                'id_product' => $req-> id_product,
                'member_id' => $req->id_member,
                'quantity' => $req->quantity,
                'price_pay' =>$req->price_pay,
            ]
            );
        $cart->save();
        $cart = Cart::where('id',$cart->id)->first();

        return Payload::toJson(new CartResource($cart),"Create Successfully",201); 

    }
}
