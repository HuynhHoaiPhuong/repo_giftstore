<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;        
use App\Http\Controllers\services\DiscountController as ServicesDiscountController;

class DiscountController extends Controller
{
    public function discountManagement(){
        $discountController = new ServicesDiscountController();
        $data_discount = $discountController->getAllRole();
        $discounts = [];
        if($data_discount['data']!=null)
        $discounts = $data_discount['data']->collection;
        return view('admin/rank_management/discount_by_category', ['discounts' => $discounts]);
    }
}
