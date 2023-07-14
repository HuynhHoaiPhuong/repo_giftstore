<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WarehouseDetail;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
class CategoryController extends Controller
{
    public function category($id){
        $lists = WarehouseDetail::join('products', 'warehouse_details.id_product', '=', 'products.id_product')
        ->join('categories', 'products.id_category','=','categories.id_category')
        ->where(function ($query) use ($id) {
            $query->where('products.id_product', 'warehouse_details.id_product')
                ->orWhere('categories.id_category', $id);
        })->paginate('9')
        ->withQueryString();
        return view('user.templates.category', ['lists' => $lists]);
    }
}
