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
                'id_member' => $req->id_member,
                'quantity' => $req->quantity,
                'price_pay' =>$req->price_pay,
            ]
            );
        $cart->save();
        $cart = Cart::where('id',$cart->id)->first();

        return Payload::toJson(new CartResource($cart),"Create Successfully",201); 

    }

    public function removeCart(Request $req){
        $cart = Cart::where('id_cart',$req->id_cart)->delete();
        return Payload::toJson(true,"Remove Successfully",202);
    }

    public function updateQuantityInCart(Request $req){

        $cart = Cart::where('id_cart',$req->id_cart)->update(['quantity'=>$req->quantity]);

        if($cart==1)
        {
            return Payload::toJson($cart,'Completed',202);
        }
        return Payload::toJson($cart,'Uncomleted',500);
    }

    public function removeAllCart(Request $req){
        $member = Member::where('id_member',$req->id_member)->first();
        $cart = Cart::where('id_member',$member->id_member)->delete();
        return Payload::toJson(true,"Remove Successfully",202);
    }
}
