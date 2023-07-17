<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\services\MemberController as ServicesMemberController;
use App\Http\Controllers\services\BillController as ServicesBillController;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index(){
        $billController = new ServicesBillController();
        $memberController = new ServicesMemberController();
        $data_member = $memberController->getIdMemberByIdUser(Auth::user()->id_user);
        $data_bill = $billController->getAllBillByIdMember($data_member['id_member']);
        $bills = [];
        if($data_bill['data']!=null)
            $bills = $data_bill['data']->collection;
        $bills = $bills->sortByDesc('order_date');
        return view('user/templates/profile', ['bills' => $bills]);
    }
}
