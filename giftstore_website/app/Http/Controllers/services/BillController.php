<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BillResource;
use App\Models\Bill;
use App\Http\Payload;
use Carbon\Carbon;
use App\Http\Controllers\services\BillDetailController as ServicesBillDetailController;
use App\Http\Controllers\services\WarehouseDetailController as ServicesWarehouseDetailController;

class BillController extends Controller
{
    public function getAllBill(){
        $bills = Bill::all();
        if($bills->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(BillResource::collection($bills), 'Request Successfully', 200);
    }
    
    public function getAllBillByStatus($status){
        $bills = Bill::where('status', $status)->get();
        if($bills->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(BillResource::collection($bills), 'Ok', 200);
    }

    public function saveBill(Request $request){
        $bills = new Bill();
        $bills->fill([
            'id_bill' => "B".Carbon::now('Asia/Ho_Chi_Minh')->format('ymdhis').rand(1, 1000), 
            'id_member' => $request->id_member, 
            'id_voucher' => $request->id_voucher,
            'id_payment' => $request->id_payment, 
            'total_quantity' => $request->total_quantity, 
            'total_price' => $request->total_price, 
            'order_date' => Carbon::now('Asia/Ho_Chi_Minh'), 
            // 'date_of_payment' => $request->date_of_payment, 
        ]);
        if($bills->save() == 1){
            $bills = Bill::where('id_bill', $bills->id_bill)->first();
            return Payload::toJson(new BillResource($bills), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }

    public function updateBillStatus(Request $request){
        $result = Bill::where('id_bill', $request->id_bill)
        ->update(['status' => $request->status]);
        if($result == 1){
            if($request->status == 4){
                $billDetailController = new ServicesBillDetailController();
                $warehouseDetailController = new ServicesWarehouseDetailController();
                $billdetails = $billDetailController->getAllBillDetailByIdBill($request->id_bill);
                foreach($billdetails['data'] as $k => $v){
                    $warehouseDetail = $warehouseDetailController->getWarehouseDetailByIdProduct($v->product->id_product);
                    $newQuantity = (int)$warehouseDetail['data']->quantity + (int)$v->quantity;
                    $newTotalPrice = $newQuantity*$warehouseDetail['data']->price_pay;
                    $reqUpdateQuantity = new Request([
                        'id_warehouse_detail'=>$warehouseDetail['data']->id_warehouse_detail,
                        'total_price'=>$newTotalPrice,
                        'quantity'=>$newQuantity
                    ]);
                    $checkRe = $warehouseDetailController->updateQuantityWarehouseDetail($reqUpdateQuantity);
                }
            }

            return Payload::toJson(true,"Update Successfully",202);
        }
        return Payload::toJson(false,"Cannot Update",500);
    }
}
