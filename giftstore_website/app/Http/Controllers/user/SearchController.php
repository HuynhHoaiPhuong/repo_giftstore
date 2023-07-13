<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WarehouseDetail;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class SearchController extends Controller
{
    public function search(Request $request){
        $keyword = ($request->has('keyword')) ? $request->query('keyword') : "";
        $keyword = trim(strip_tags($keyword));

        $lists = [];

        if ($keyword != ""){
            $lists = WarehouseDetail::join('products', 'warehouse_details.id_product', '=', 'products.id_product')
            ->join('categories', 'products.id_category','=','categories.id_category')
            ->join('providers', 'products.id_provider','=','providers.id_provider')
            ->where(function ($query) use ($keyword) {
                $query->where("products.name", "like", "%$keyword%")
                    ->orWhere("categories.name", "like", "%$keyword%")
                    ->orWhere("providers.name", "like", "%$keyword%");
            })->get();

            $id_product = $lists->pluck('id_product');

            $lists = WarehouseDetail::whereIn('id_product', $id_product)
            ->paginate('9')
            ->withQueryString();
        }
        return view('user.templates.search', [
            'keyword' => $keyword, 
            'lists' => $lists
        ]);
    }
}


