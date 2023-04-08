<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Resources\CartResource;
use App\Models\Member;
use App\Http\Payload;
use Carbon\Carbon;

class CartController extends Controller
{
    public function getAllCartByIdMember($id){
        $carts = Cart::where('id_member',$id)->get();

        if($carts->isEmpty()){
            return Payload::toJson(null, "Data Not Found", 404);
        }

        return Payload::toJson(CartResource::collection($carts),"Request Successfully",200);
    }
    public function store(Request $request){
        $carts = new Cart();
        $carts->fill(
            [
                'id_cart' => "CART".Carbon::now()->format('ymdhis').$request->id_product.$request->id_member,
                'id_product' => $request->id_product,
                'id_member' => $request->id_member,
                'quantity' => $request->quantity,
            ]
        );
        $carts->save();
        $carts = Cart::where('id_cart', $carts->id_cart)->first();

        return Payload::toJson(new CartResource($carts), "Create Successfully", 201); 

    }

    public function removeCart(Request $request){
        $carts = Cart::where('id_cart', $request->id_cart)->delete();

        return Payload::toJson(true, "Remove Successfully", 202);
    }

    public function updateQuantityInCart(Request $request){
        $carts = Cart::where('id_cart', $request->id_cart)->update(['quantity' => $request->quantity]);

        if($carts == 1)
        {
            return Payload::toJson($carts, 'Completed', 202);
        }
        return Payload::toJson($carts, 'Uncomleted', 500);
    }

    public function removeAllCart(Request $request){
        $member = Member::where('id_member', $request->id_member)->first();
        $carts = Cart::where('id_member', $member->id_member)->delete();

        return Payload::toJson(true, "Remove Successfully",202);
    }
}
