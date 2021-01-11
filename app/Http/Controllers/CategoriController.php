<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriController extends Controller
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
    //category product=============================================================================
    public function addcategory_products(){
        $this->AuthLogin();
        return view('admin.addcategory_products');
    }
    public function allcategory_product(){
        $this->AuthLogin();
        $allcategory_product=DB::table('tbl_category_product')->get();
        $view_allcategory_product=view('admin.allcategory_product')->with('allcategory_product',$allcategory_product);
        return view('admin.admin_layout')->with('admin.allcategory_product',$view_allcategory_product);
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data=array();//tạo biến data lưu dữ liệu chuỗi
        //lấy dữ liệu trong bảng ra
        $data['category_name']=$request->category_products_name;//lấy dữ liệu cột name trong bảng = tên input name trong input
        $data['category_desc']=$request->category_products_desc;
        $data['category_status']=$request->category_products_status;
        
        $resuft = DB::table('tbl_category_product')->insert($data);//gắn vô cột tương ứng
        Session::put('message','Thêm danh mục thành công');
        return redirect::to('allcategory_product');
    }
    public function show_category($category_id){
        $this->AuthLogin();
        $update = DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status'=>1]);
        Session::put('message','Ẩn thành công');
        return  redirect::to('allcategory_product');
    }
    public function hiden_category($category_id){
        $this->AuthLogin();
        $update = DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status'=>0]);
        Session::put('message','Hiện thành công');
        return  redirect::to('allcategory_product');
    }
    //edit category
    public function edit_category_product($edit){
        $this->AuthLogin();
        $edit_category_product=DB::table('tbl_category_product')->where('category_id',$edit)->get();
        $view_allcategory_product=view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin.admin_layout')->with('admin.edit_category_product',$view_allcategory_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data=array();//tạo biến data lưu dữ liệu chuỗi
        //lấy dữ liệu trong bảng ra
        $data['category_name']=$request->category_products_name;//lấy dữ liệu cột name trong bảng = tên input name trong input
        $data['category_desc']=$request->category_products_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return  redirect::to('allcategory_product');
    }
    //delete category
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','xóa sản phẩm thành công');
        return  redirect::to('allcategory_product');
    }
    
}
