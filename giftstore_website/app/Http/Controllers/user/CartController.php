<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\services\CartController as ServicesCartController;
use App\Http\Controllers\services\MemberController as ServicesMemberController;
use App\Http\Controllers\services\PaymentController as ServicesPaymentController;
use App\Models\Member;

class CartController extends Controller
{
    public function cart(){
        if(Auth::check()){
            $cartController = new ServicesCartController();
            $memberController = new ServicesMemberController();

            $member = $memberController->getIdMemberByIdUser(Auth::id());

            $data_cart = $cartController->getAllCartByIdMember($member['id_member']);
            $carts = [];
            if($data_cart['data']!=null)
                $carts = $data_cart['data']->collection;

            $paymentController = new ServicesPaymentController();
            $data_payment = $paymentController->getAllPaymentByStatus('enabled');
            $payments = [];
            if($data_payment['data']!=null)
                $payments = $data_payment['data']->collection;

            return view('user/templates/cart', ['carts' => $carts, 'payments' => $payments]);
        }
        return null; 
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
