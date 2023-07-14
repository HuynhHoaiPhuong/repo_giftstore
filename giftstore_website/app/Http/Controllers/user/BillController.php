<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\services\BillController as ServicesBillController;
use App\Http\Controllers\services\BillDetailController as ServicesBillDetailController;
use App\Http\Controllers\services\MemberController as ServicesMemberController;
use App\Http\Controllers\services\CartController as ServicesCartController;
use App\Http\Controllers\services\WarehouseDetailController as ServicesWarehouseDetailController;

class BillController extends Controller
{
    public function payBill(Request $req){
        $billController = new ServicesBillController();
        $billDetailController = new ServicesBillDetailController();
        $memberController = new ServicesMemberController();
        $cartController = new ServicesCartController();
        $warehouseDetailController = new ServicesWarehouseDetailController();

        $member = $memberController->getIdMemberByIdUser(Auth::id());
        // 
        $totalPrice = 0;
        $totalQuantity = 0;
        foreach($req->dataProduct as $product){            
            $totalPrice += $product['price']*$product['quantity'];
            $totalQuantity += $product['quantity'];
        }
        $reqBill = new Request([
            'id_member'=>$member['id_member'],
            'id_payment'=>$req->id_payment,
            'total_price'=>$totalPrice,
            'total_quantity'=>$totalQuantity
        ]);

        $data_bill = $billController->saveBill($reqBill);
        $bill = [];
        if($data_bill['data']!=null)
            $bill = $data_bill['data'];

        //
        $billDetail = [];
        foreach($req->dataProduct as $key => $product){
            $reqBillDetail = new Request([
                'id_bill'=> $bill->id_bill,
                'id_product'=>$product['id_product'],
                'total_price'=>($product['price']*$product['quantity']),
                'quantity'=>$product['quantity']
            ]);
            $data_billDetail = $billDetailController->saveBillDetail($reqBillDetail);
            if($data_billDetail['data']!=null)
                $billDetail[$key] = $data_billDetail['data'];
        }
        
        if($billDetail != []){
            $cartController->clearCartByIdMember($member['id_member']);
            
            foreach($req->dataProduct as $k => $v){
                $warehouseDetail = $warehouseDetailController->getWarehouseDetailByIdProduct($v['id_product']);
                if($warehouseDetail['data']['quantity'] < (int)$v['quantity']){
                    $newQuantity = (int)$warehouseDetail['data']['quantity'];
                }else{
                    $newQuantity = (int)$warehouseDetail['data']['quantity'] - (int)$v['quantity'];
                }
                $newTotalPrice = $newQuantity*$warehouseDetail['data']['price_pay'];
                
                $reqUpdateQuantity = new Request([
                    'id_warehouse_detail'=>$warehouseDetail['data']['id_warehouse_detail'],
                    'total_price'=>$newTotalPrice,
                    'quantity'=>$newQuantity
                ]);
                $checkRe = $warehouseDetailController->updateQuantityWarehouseDetail($reqUpdateQuantity);
            }
            return redirect()->route('/');
        }


       
        

        return redirect()->route('cart');
    }
}
