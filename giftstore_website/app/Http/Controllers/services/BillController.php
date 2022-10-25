<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use Carbon\Carbon;
use App\Http\Resources\BillResource;
use App\Http\Payload;

class BillController extends Controller
{
    public function getAllRankByStatus($status)
    {
        $bills = Bill::where([
                ['status', $status]
            ])->orderBy('id_bill','ASC')->get();
         if($bills->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(BillResource::collection($bills),"Request Successfully",200);
    }
}
