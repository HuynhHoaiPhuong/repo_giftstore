<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\services\CartController as ServicesCartController;
use App\Http\Controllers\services\MemberController as ServicesMemberController;
use App\Http\Controllers\services\PaymentController as ServicesPaymentController;
use App\Http\Payload;

class CartController extends Controller
{
    private $cartController;
    private $memberController;

    public function __construct(ServicesCartController $cartController, ServicesMemberController $memberController)
    {
        $this->cartController = $cartController;
        $this->memberController = $memberController;
    }

    public function cart()
    {
        if (Auth::check()) {
            $member = $this->memberController->getIdMemberByIdUser(Auth::id());
            $data_cart = $this->cartController->getAllCartByIdMember($member['id_member']);
            $carts = [];
            if ($data_cart['data'] != null) {
                $carts = $data_cart['data']->collection;
            }

            $paymentController = new ServicesPaymentController();
            $data_payment = $paymentController->getAllPaymentByStatus('enabled');
            $payments = [];
            if ($data_payment['data'] != null) {
                $payments = $data_payment['data']->collection;
            }
            $tempPrice = 0;
            return view('user/templates/cart', [
                'carts' => $carts,
                'payments' => $payments,
                'tempPrice' => $tempPrice,
            ]);
        }
        return null;
    }

    public function buyNow($id_product)
    {
        if (Auth::check()) {
            $member = $this->memberController->getIdMemberByIdUser(Auth::id());
            $existingCartItem = $this->cartController->getCartItem($member['id_member'], $id_product);

            if($existingCartItem) {
                $existingCartItem['quantity'] += 1;
                $this->cartController->updateCartItem($existingCartItem);
            } 
            else {
                $requestCart = new Request([
                    'id_member' => $member['id_member'],
                    'id_product' => $id_product,
                    'quantity' => 1,
                ]);
                $this->cartController->saveCart($requestCart);
            }
            session()->flash('success', 'Đã thêm vào giỏ hàng');
            return Payload::toJson(true, "Add Successfully", 202);
        } 
        return Payload::toJson(false, "Cannot Add!", 500);
    }


    public function updateQuantity(Request $request, $id_product)
    {
        if (Auth::check()) {
            $member = $this->memberController->getIdMemberByIdUser(Auth::id());
            $existingCartItem = $this->cartController->getCartItem($member['id_member'], $id_product);

            if($existingCartItem) {
                $existingCartItem['quantity'] = $request->quantity;
                $this->cartController->updateCartItem($existingCartItem);
            } 
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    public function removeItem($id_product)
    {
        $this->cartController->removeItem($id_product);

    }
}
