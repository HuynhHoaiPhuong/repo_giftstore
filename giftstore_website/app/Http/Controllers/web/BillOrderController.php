<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class BillOrderController extends Controller
{
    public function addBillOrder(){
        $producer = DB::table('tbl_producer')->orderby('id','desc')->get();
        $user = DB::table('tbl_user')->orderby('id','desc')->get();
        $stock = DB::table('tbl_stock')->orderby('id','desc')->get();
        return view('admin.add_bill_order')->with('producer',$producer)->with('user',$user)->with('stock',$stock);
        
    }
    public function saveBillOrder(Request $request){
        $data = array();
        $data['id'] = $request->id;
        $data['id_producer'] = $request->id_producer;
        $data['id_user'] = $request->id_user;
        $data['id_stock'] = $request->id_stock;
        $data['quantity'] = $request->quantity;
        $data['total_price'] = $request->total_price;
        $data['date_order'] = $request->date_order;
        $data['status'] = $request->status;
        DB::table('tbl_bill_order')->insert($data); 
        return redirect('admin/add-bill-order');

    }
    public function allBillOrder(){
        $all_bill_order = DB::table('tbl_bill_order')
        ->join('tbl_producer','tbl_producer.id','=','tbl_bill_order.id_producer')
        ->join('tbl_user','tbl_user.id','=','tbl_bill_order.id_user')
        ->join('tbl_stock','tbl_stock.id','=','tbl_bill_order.id_stock')
        ->orderby('tbl_bill_order.id','desc')->get();
        $manager_bill_order = view('admin.all_bill_order')->with('all_bill_order', $all_bill_order); 
        return view('admin_layout')->with('admin.all_bill_order',$manager_bill_order);   

    }
    public function unActiveBillOrder($id){
        DB::table('tbl_bill_order')->where('id', $id)->update(['status' => 'an']);
        return redirect('admin/all-bill-order');

    }
    public function activeBillOrder($id){
        DB::table('tbl_bill_order')->where('id', $id)->update(['status' => 'hienthi']);
        return redirect('admin/all-bill-order');

    }
    public function editBillOrder($id){
        $producer = DB::table('tbl_producer')->orderby('id','desc')->get();
        $user = DB::table('tbl_user')->orderby('id','desc')->get();
        $stock = DB::table('tbl_stock')->orderby('id','desc')->get();
        // return view('admin.add_bill_order')->with('producer',$producer)->with('user',$user)->with('stock',$stock);
        $edit_bill_order = DB::table('tbl_bill_order')->where('id',$id)->get();
        $manager_bill_order = view('admin.edit_bill_order')->with('edit_bill_order',$edit_bill_order)->with('id',$producer)->with('id',$user)->with('id',$stock); 
        return view('admin_layout')->with('admin.edit_bill_order', $manager_bill_order);
        
    }
    public function updateBillOrder(Request $request, $id){
        $data = array();
        $data['id'] = $request->id;
        $data['id_producer'] = $request->id_producer;
        $data['id_user'] = $request->id_user;
        $data['id_stock'] = $request->id_stock;
        $data['quantity'] = $request->quantity;
        $data['total_price'] = $request->total_price;
        $data['date_order'] = $request->date_order;
        $data['status'] = $request->status;
        DB::table('tbl_bill_order')->where('id',$id)->update($data); 
        return redirect('admin/all-bill-order');

    }

    public function delBillOrder($id){
        DB::table('tbl_bill_order')->where('id',$id)->delete();
        return redirect('admin/all-bill-order');
    
    }

}