<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class productController extends Controller
{
    public function addProduct(){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);

    }
    public function saveProduct(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data); 
            Session::put('message','Thêm sản phẩm thành công');
            return redirect('add-product');

        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data); 
        Session::put('message','Thêm sản phẩm thành công');
        return redirect('add-product');

    }
    public function allProduct(){
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product); 
        return view('admin_layout')->with('admin.all_product',$manager_product);

    }
    public function unActiveProduct($id){
        DB::table('tbl_product')->where('product_id',$id)->update(['product_status' => 1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect('/all-product');


    }
    public function activeProduct($id){
        DB::table('tbl_product')->where('product_id',$id)->update(['product_status' => 0]);
        Session::put('message','Hủy kích hoạt danh mục sản phẩm thành công');
        return redirect('/all-product');

    }
    public function editProduct($id){

        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product', $cate_product)->with('brand_product',$brand_product); 
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    
    public function updateProduct(Request $request, $id){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

       $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$id)->update($data); 
            Session::put('message','Cập nhật sản phẩm thành công!');
            return redirect('/all-product');
        }
        DB::table('tbl_product')->where('product_id',$id)->update($data); 
        Session::put('message','Cập nhật sản phẩm thành công');
        return redirect('/all-product');

    }

    public function deleteProduct($id){
        DB::table('tbl_product')->where('product_id',$id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return redirect('/all-product');
    
    }
}
        