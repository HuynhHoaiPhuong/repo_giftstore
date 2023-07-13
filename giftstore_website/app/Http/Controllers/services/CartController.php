<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Resources\CartResource;
use App\Http\Payload;
use Carbon\Carbon;

class CartController extends Controller
{
    public function getAllCartByIdMember($id){
        $carts = Cart::where('id_member', $id)->get();
        if($carts->isEmpty()){
            return Payload::toJson(null, "Data Not Found", 404);
        }
        return Payload::toJson(CartResource::collection($carts),"OK",200);
    }

    public function saveCart(Request $request){
        $cart = new Cart();
        $cart->fill([
                'id_cart' => "CART".Carbon::now()->format('ymdhis').$request->id_product.$request->id_member,
                'id_product' => $request->id_product,
                'id_member' => $request->id_member,
                'quantity' => $request->quantity,
                'price_pay' => $request->price_pay,
            ]
        );
        if($cart->save() == 1){
            $cart = Cart::where('id_cart', $cart->id_cart)->first();
            return Payload::toJson(new CartResource($cart),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function clearCartByIdMember($id_member){
        $result = Cart::where('id_member', $id_member)->delete();
        if($result) return Payload::toJson(true, "Remove Successfully", 202);
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }

    public function removeItem($id_product){
        $result = Cart::where('id_product', $id_product)->delete();
        if($result) 
            return Payload::toJson(true, "Remove Successfully", 202);
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }

    public function getCartItem($memberId, $productId) {
        $cartItem = Cart::where('id_member', $memberId)->where('id_product', $productId)->first();
        return $cartItem;
    }

    public function updateCartItem($cartItem) {
        Cart::where('id_cart', $cartItem['id_cart'])->update(['quantity' => $cartItem['quantity']]);
    }
}
