<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class categoriesController extends Controller
{

    public function addCategoryProduct(){
        return view('admin.add_category_product');

    }
    public function saveCategoryProduct(Request $request){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->insert($data); 
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return redirect('/all-category-product');

    }
    public function allCategoryProduct(){
        $all_category_product = DB::table('tbl_category_product')->get();

        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product); 

        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);

    }
    public function unActiveCategoryProduct($id){
        DB::table('tbl_category_product')->where('category_id',$id)->update(['category_status' => 1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect('/all-category-product');

    }
    public function activeCategoryProduct($id){
        DB::table('tbl_category_product')->where('category_id',$id)->update(['category_status' => 0]);
        Session::put('message','Hủy kích hoạt danh mục sản phẩm thành công');
        return redirect('/all-category-product');

    }
    public function editCategoryProduct($id){
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product); 
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    
    public function updateCategoryProduct($id){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->where('category_id',$id)->update($data);
        Session::put('message','Cập nhật thành công!');
        return redirect('/all-category-product');
        
    }

    public function deleteCategoryProduct($id){
        DB::table('tbl_category_product')->where('category_id',$id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return redirect('/all-category-product');
    
    }

    //End function admin page

    public function showCategoryHome($id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $cateById = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$id)->get();

        $cateName = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$id)->limit(1)->get();

        return view('pages.categories.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('cateById',$cateById)->with('cateName',$cateName);
    }

}
        