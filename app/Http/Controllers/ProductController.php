<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
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
    public function add_product(){
        $this->AuthLogin();
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_products',$cate_product)->with('brand_products',$brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $view_all_product=view('admin.all_product')->with('all_product',$all_product);
        return view('admin.admin_layout')->with('admin.all_product',$view_all_product);

        // $all_product=DB::table('tbl_product')->get();
        // $view_all_product=view('admin.all_product')->with('all_product',$all_product);
        // return view('admin.admin_layout')->with('admin.all_product',$view_all_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data=array();//tạo biến data lưu dữ liệu chuỗi
        //lấy dữ liệu trong bảng ra
        $data['product_name']=$request->product_name;//lấy dữ liệu cột name trong bảng = tên input name trong input
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_price']=$request->product_price;
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();//lấy tên ảnh
            $name_image=current(explode('.',$get_name_image));//tách tên và đuôi giữa dấu . ra(exploda: lấy tên đầu/ end: lấy cuối)
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();//.$get_image->getClientOriginalExtension() =  phần đuôi hình(jpg,png)
            $get_image->move('public/upload/product',$new_image);
            $data['product_image']=$new_image;
            $resuft = DB::table('tbl_product')->insert($data);//gắn vô cột tương ứng
            Session::put('message','Thêm sản phẩm thành công');
            return redirect::to('add_product');
        }
        $data['product_image']='';

        $resuft = DB::table('tbl_product')->insert($data);//gắn vô cột tương ứng
        Session::put('message','Thêm sản phẩm thành công');
        return redirect::to('add_product');
    }
     //edit brand
     public function edit_product($edit){
        $this->AuthLogin();
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $edit_product=DB::table('tbl_product')->where('product_id',$edit)->get();
        $view_all_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin.admin_layout')->with('admin.edit_product',$view_all_product);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data=array();//tạo biến data lưu dữ liệu chuỗi
        //lấy dữ liệu trong bảng ra
        $data['product_name']=$request->product_name;//lấy dữ liệu cột name trong bảng = tên input name trong input
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_price']=$request->product_price;
        $get_image=$request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();//lấy tên ảnh
            $name_image=current(explode('.',$get_name_image));//tách tên và đuôi giữa dấu . ra(exploda: lấy tên đầu/ end: lấy cuối)
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();//.$get_image->getClientOriginalExtension() =  phần đuôi hình(jpg,png)
            $get_image->move('public/upload/product',$new_image);
            $data['product_image']=$new_image;
            $resuft = DB::table('tbl_product')->where('product_id',$product_id)->update($data);//gắn vô cột tương ứng
            Session::put('message','Thêm sản phẩm thành công');
            return redirect::to('all_product');
        }
        $resuft = DB::table('tbl_product')->update($data);//gắn vô cột tương ứng
        Session::put('message','update sản phẩm thành công');
        return redirect::to('all_product');
    }
    public function show_product($product_id){
        $this->AuthLogin();
        $update = DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Ẩn thành công');
        return  redirect::to('all_product');
    }
    public function hiden_product($product_id){
        $this->AuthLogin();
        $update = DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Hiện thành công');
        return  redirect::to('all_product');
    }
    //delete brand
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','xóa sản phẩm thành công');
        return  redirect::to('all_product');
    }
}
