<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Resources\PaymentResource;
use Carbon\Carbon;
use App\Http\Payload;

class PaymentController extends Controller
{
    public function getAllPayment()
    {
        $payments= Payment::all();
        if($payments->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(PaymentResource::collection($payments),'Request Successfully',200);
    }

    public function getAllPaymentByStatus ($status)
    {
        $payments= Payment::where('status',$status)->get();
        if($payments->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(PaymentResource::collection($payments),'Request Successfully',200);
    }

    public function getPaymentById ($id_payment)
    {
        $payment= Payment::where('id_payment',$id_payment)->first();
        if(!$payment)
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(new PaymentResource($payment),'Request Successfully',200);
    }

    public function savePayment(Request $req)
    {
        $payment = new Payment();
        $newName = '';
        if($req->hasFile('photo')){
            $photo = $req->file('photo');
            $name = $photo->getClientOriginalName();
            $originalName = current(explode('.',$name));
            $newName = $originalName . rand(0,99) . '.' . $photo->getClientOriginalExtension(); 
            $photo->move('admin/images/payments', $newName);
        }
        $payment->fill([
            'id_payment' => Carbon::now()->format('ymdhis').rand(1,1000),
            'photo'=>$newName,
            'name'=>$req->name,
        ]);
        if($payment->save()==1){
            $payment=Payment::where('id_payment',$payment->id_payment)->first();
            return Payload::toJson(new PaymentResource($payment),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updatePayment(Request $req)
    {
        // $payment = new Payment();
        // $newName = '';
        // if($req->hasFile('photo')){
        //     $photo = $req->file('photo');
        //     $name = $photo->getClientOriginalName();
        //     $originalName = current(explode('.',$name));
        //     $newName = $originalName . rand(0,99) . '.' . $photo->getClientOriginalExtension(); 
        //     $photo->move('admin/images/payments', $newName);
        // }
        $result = Payment::where('id_payment', $req -> id_payment)
            //Key Value // Get e by array...
            ->update(
                [
                    // 'photo'=>$newName,
                    'photo'=>$req->photo,
                    'name'=>$req->name,
                ]
            );  
        if($result == 1){
            $payment = Payment::where('id_payment',$req->id_payment)->first();
            return Payload::toJson(new PaymentResource($payment),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
    
    public function removePayment(Request $req)
    {
        $result= Payment::where('id_payment',$req->id_payment)
        ->update(['status'=>$req->status]);
        if($result==1){
            $payment = Payment::where('id_payment',$req->id_payment)->first();
            return Payload::toJson(new PaymentResource($payment),'Completed',200);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function deletePayment(Request $req)
    {
        if($req->id_payment){
            $result = Payment::where('id_payment', $req->id_payment)->delete();
            if($result) return Payload::toJson(true, "Remove Successfully", 202);
        }
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }

    public function clearPayment(Request $req)
    {
        $result = Payment::where('status', 'disabled')->delete();
        if($result) return Payload::toJson(true, "Remove Successfully", 202);
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }
}
