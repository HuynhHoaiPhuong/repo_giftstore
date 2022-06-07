<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class brandController extends Controller
{
    public function addBrandProduct()
    {
        return view('admin.add_brand_product');
    }
    public function saveBrandProduct(Request $request){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        DB::table('tbl_brand_product')->insert($data); 
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return redirect('/all-brand-product');

    }
    public function allBrandProduct(){
        $all_brand_product = DB::table('tbl_brand_product')->get();

        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product); 

        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);

    }
    public function unActiveBrandProduct($id){
        DB::table('tbl_brand_product')->where('brand_id',$id)->update(['brand_status' => 1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect('/all-brand-product');

    }
    public function activeBrandProduct($id){
        DB::table('tbl_brand_product')->where('brand_id',$id)->update(['brand_status' => 0]);
        Session::put('message','Hủy kích hoạt danh mục sản phẩm thành công');
        return redirect('/all-brand-product');

    }
    public function editBrandProduct($id){
        $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product); 
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    
    public function updateBrandProduct($id){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        DB::table('tbl_brand_product')->where('brand_id',$id)->update($data); 
        Session::put('message','Cập nhật thành công!');
        return redirect('/all-brand-product');
        
    }

    public function deleteBrandProduct($id){
        DB::table('tbl_brand_product')->where('brand_id',$id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return redirect('/all-brand-product');
    
    }

    //End function admin page

    public function showBrandHome($id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $brandById = DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_product.brand_id',$id)->get();
        $braName = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$id)->limit(1)->get();

        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brandById',$brandById)->with('braName',$braName);
    }
}
