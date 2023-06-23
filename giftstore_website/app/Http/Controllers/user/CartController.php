<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\services\CartController as ServicesCartController;
use App\Http\Controllers\services\MemberController as ServicesMemberController;

class CartController extends Controller
{
    public function cart(){

        return view('user.templates.cart');
    }

    public function buyNow($id_product){
        if(Auth::check()){
            $cartController = new ServicesCartController();

            $memberController = new ServicesMemberController();
            $member = $memberController->getIdMemberByIdUser(Auth::id());
            $reqCart = new Request([
                'id_member'=>$member['id_member'],
                'id_product'=>$id_product,
                'quantity'=> 1,
            ]);
            $data_cart = $cartController->saveCart($reqCart);
            return redirect()->route('cart');
        }else{
            return redirect()->route('log-in');
        }
    }
}
