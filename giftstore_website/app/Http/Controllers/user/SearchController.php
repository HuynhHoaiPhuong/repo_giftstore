<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WarehouseDetail;

class SearchController extends Controller
{
    public function search(Request $request){
        $keyword = ($request->has('keyword')) ? $request->query('keyword') : "";
        $keyword = trim(strip_tags($keyword));
        $lists = [];

        if ($keyword != ""){
            $lists = WarehouseDetail::join('products', 'warehouse_details.id_product', '=', 'products.id_product')
            ->where("products.name", "like", "%$keyword%")->get();
        }
        // dd($lists);
        return view('user.templates.search', ['keyword' => $keyword , 'lists' => $lists]);
    }
}
