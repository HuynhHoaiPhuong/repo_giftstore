<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function discountManagement(){
        return view('admin/rank_management/discount_by_category');
    }
}
