<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;
session_start();

class BillController extends Controller
{

    public function addBill(){
        $member = DB::table('tbl_member')->orderby('id','desc')->get();
        return view('admin.bill_management.add_bill')->with('member',$member);
        
    }
    public function allBill(){
        $all_bill = DB::table('tbl_bill')
        ->join('tbl_member','tbl_member.id','=','tbl_bill.id_member')
        ->orderby('tbl_bill.id','desc')->get();
        $manager_bill = view('admin.bill_management.all_bill')->with('all_bill', $all_bill); 
        return view('admin_layout')->with('admin.bill_management.all_bill',$manager_bill);   

    }
    public function saveBill(Request $request){
        $datenow = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s');
        $data = array();
        $data['id'] = $request->id_member.$datenow;
        $data['id_member'] = $request->id_member;
        $data['code_voucher'] = $request->code_voucher;
        $data['total_quantity'] = $request->total_quantity;
        $data['total_price'] = $request->total_price;
        $data['payment'] = $request->payment;
        $data['date_order'] = $request->date_order;
        $data['date_confirm'] = $request->date_confirm;
        $data['status'] = $request->status;
        DB::table('tbl_bill')->insert($data); 
        return redirect('admin/add-bill');

    }
    public function unActiveBill($id){
        DB::table('tbl_bill')->where('id', $id)->update(['status' => 'an']);
        return redirect('admin/all-bill');

    }
    public function activeBill($id){
        DB::table('tbl_bill')->where('id', $id)->update(['status' => 'hienthi']);
        return redirect('admin/all-bill');

    }
    // public function editBill($id){
    //     $member = DB::table('tbl_member')->orderby('id','desc')->get();
        
    //     $edit_bill = DB::table('tbl_bill')->where('id',$id)->get();
    //     $manager_bill = view('admin.bill_management.edit_bill')
    //     ->with('edit_bill',$edit_bill)
    //     ->with('member',$member); 

    //     return view('admin_layout')->with('admin.bill_management.edit_bill', $manager_bill);
        
    // }

    public function editBill($id){

        $member = DB::table('tbl_member')->orderby('id','desc')->get();

        $edit_bill = DB::table('tbl_bill')->where('id',$id)->get();
        $manager_bill = view('admin.bill_management.edit_bill')
        ->with('edit_bill',$edit_bill)
        ->with('member',$member); 
        
        return view('admin_layout')->with('admin.bill_management.edit_product', $manager_bill);
    }
    public function updateBill(Request $request, $id){
        $data = array();
        $data['code_voucher'] = $request->code_voucher;
        $data['total_quantity'] = $request->total_quantity;
        $data['total_price'] = $request->total_price;
        $data['payment'] = $request->payment;
        $data['date_order'] = $request->date_order;
        $data['date_confirm'] = $request->date_confirm;
        $data['status'] = $request->status;
        DB::table('tbl_bill')->where('id',$id)->update($data); 
        return redirect('admin/all-bill');

    }

    public function delBill($id){
        DB::table('tbl_bill')->where('id',$id)->delete();
        return redirect('admin/all-bill');
    
    }
 
}