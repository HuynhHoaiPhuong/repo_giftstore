<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\PaymentController as ServicesPaymentController;

class PaymentController extends Controller
{
    public function paymentManagement(){
        $paymentController = new ServicesPaymentController();
        $data_payment = $paymentController->getAllPaymentByStatus('enabled');
        $payments = [];
        if($data_payment['data']!=null)
        $payments = $data_payment['data']->collection;
        return view('admin/payment_management/payment_management',['payments'=>$payments]);
    }

    public function addPayment(Request $req){
        $paymentController = new ServicesPaymentController();
        if($req->name==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        $result = $paymentController->savePayment($req);
        if($result==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        return redirect(route('payment-management'));
    }

    public function updatePayment(Request $req){
        $paymentController = new ServicesPaymentController();

        $result = $paymentController->updatePayment($req);

        if($result==null){
            return back()->withErrors('error','Chỉnh sửa thất bại');
        }
        return redirect(route('payment-management'));
    }

    public function recyclePayment(){
        $paymentController = new ServicesPaymentController();
        $data_payment = $paymentController->getAllPaymentByStatus('disabled');
        $payments = [];
        if($data_payment['data']!=null)
        $payments = $data_payment['data']->collection;
        return view('admin/payment_management/recycle_payment',['payments'=>$payments]);
    }
}
