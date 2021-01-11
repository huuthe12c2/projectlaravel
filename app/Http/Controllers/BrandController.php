<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function AuthLogin()
    {
        $admin_id=Session::get('admin_id');//có login thì mới có admin_id rồi cho vào dasboad nếu k có thì k cho vào 
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else
        {
            return Redirect::to('adminlogin')->send();
        }
    }
    public function addbrand_product(){
        $this->AuthLogin();
        return view('admin.addbrand_product');
    }
    public function allbrand_product(){
        $this->AuthLogin();
        $allbrand_product=DB::table('tbl_brand_product')->get();
        $view_allbrand_product=view('admin.allbrand_product')->with('allbrand_product',$allbrand_product);
        return view('admin.admin_layout')->with('admin.allbrand_product',$view_allbrand_product);
    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data=array();//tạo biến data lưu dữ liệu chuỗi
        //lấy dữ liệu trong bảng ra
        $data['brand_name']=$request->brand_products_name;//lấy dữ liệu cột name trong bảng = tên input name trong input
        $data['brand_introduce']=$request->brand_products_introduce;
        $data['brand_status']=$request->brand_products_status;
        $resuft = DB::table('tbl_brand_product')->insert($data);//gắn vô cột tương ứng
        Session::put('message','Thêm thương hiệu thành công');
        return redirect::to('allbrand_product');
    }
     //edit brand
     public function edit_brand_product($edit){
        $this->AuthLogin();
        $edit_brand_product=DB::table('tbl_brand_product')->where('brand_id',$edit)->get();
        $view_allbrand_product=view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin.admin_layout')->with('admin.edit_brand_product',$view_allbrand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        $data=array();//tạo biến data lưu dữ liệu chuỗi
        //lấy dữ liệu trong bảng ra
        $data['brand_name']=$request->brand_products_name;//lấy dữ liệu cột name trong bảng = tên input name trong input
        $data['brand_introduce']=$request->brand_products_introduce;
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu thành công');
        return  redirect::to('allbrand_product');
    }
    public function show_brand($brand_id){
        $this->AuthLogin();
        $update = DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update(['brand_status'=>1]);
        Session::put('message','Ẩn thành công');
        return  redirect::to('allbrand_product');
    }
    public function hiden_brand($brand_id){
        $this->AuthLogin();
        $update = DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update(['brand_status'=>0]);
        Session::put('message','Hiện thành công');
        return  redirect::to('allbrand_product');
    }
    //delete brand
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','xóa thương hiệu thành công');
        return  redirect::to('allbrand_product');
    }
}
