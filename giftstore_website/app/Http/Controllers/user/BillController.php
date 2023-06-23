<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\services\BillController as ServicesBillController;
use App\Http\Controllers\services\MemberController as ServicesMemberController;

class BillController extends Controller
{
    public function payBill(Request $req){
        $billController = new ServicesBillController();

        $memberController = new ServicesMemberController();
        $member = $memberController->getIdMemberByIdUser(Auth::id());

        var_dump($req->data->product->quantity);die('XXXX');

        $reqBill = new Request([
            'id_member'=>$member['id_member'],
            'id_product'=>$id_product,
            'quantity'=> $req->dataProduct->quantity,
        ]);

        $data_bill = $billController->saveBill($reqBill);
        $bills = [];
        if($data_bill['data']!=null)
            $bills = $data_bill['data']->collection;
        
        return redirect()->route('log-in');
    }
}
