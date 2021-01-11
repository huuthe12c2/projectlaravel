<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
class ShopController extends Controller
{
    public function save_card(Request $request){
        
        $productid_hidden = $request->productid_hidden;
        $qty = $request->qty;
        $product_infor=DB::table('tbl_product')->where('product_id',$productid_hidden)->first();
   
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();
        $data['id']=$product_infor->product_id;
        $data['qty']= $qty;
        $data['name']=$product_infor->product_name;
        $data['price']=$product_infor->product_price;
        $data['weight']='123';
        $data['options']['product_image']=$product_infor->product_image;
         Cart::add($data);
        return Redirect::to('/show_card');
    }
    public function show_card(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('checkout.show_card')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);//đưa về số lượng 0
        return Redirect::to('/show_card');
    }
    public function update_cart_quatity(Request $request){
       $rowId = $request->rowId_cart;
       $quantity = $request->quantity;
       Cart::update($rowId, $quantity);
        return Redirect::to('/show_card');
    }
    //thanh toan============================================
    //check out
    public function login_checkout(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function register_cuctomer(Request $request){
        $data=array();
        $data['cuctomer_name']=$request->cuctomer_name;
        $data['cuctomer_email']=$request->cuctomer_email;
        $data['cuctomer_password']=md5($request->cuctomer_password);
        $data['cuctomer_phone']=$request->cuctomer_phone;
       
        $cuctomer_id = DB::table('tbl_cuctomer')->insertGetId($data);
        Session::put('cuctomer_id',$cuctomer_id);
        Session::put('cuctomer_name',$request->cuctomer_name);//khi người dùng đăng ký và đăng nhập sinh ra phiên giao dịch
        return Redirect::to('/checkout');
    }
    public function checkout(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('checkout.checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function save_checkout_cuctomer(Request $request){
        $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_andress']=$request->shipping_andress;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_message']=$request->shipping_message;
        $shipping_id = DB::table('tbl_shipping_table')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }
    public function payment(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function order_place(Request $request){
        //get payment_method
        $data=array();
        $data['payment_method']=$request->payment_option;
        $data['payment_status']="Đang chờ xử lý";
        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        //get order
        $order_data=array();
        $order_data['cuctomer_id']=Session::get('cuctomer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=Cart::total();
        $order_data['order_status']="Đang chờ xử lý";
        $order_id = DB::table('tbl_orderplace')->insertGetId($order_data);
        //get order details
        $content=Cart::content();
        foreach($content as $v_content){
            $order_data=array();
        $order_data['order_id']=$order_id;
        $order_data['product_id']=$v_content->id;
        $order_data['product_name']=$v_content->name;
        $order_data['product_price']=$v_content->price;
        $order_data['product_sales_quantity']=$v_content->qty;
        DB::table('tbl_order')->insert($order_data);
        }
        if($data['payment_method']==1)
        {
            Cart::destroy();
            $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
            return view('checkout.handcasd')->with('category',$cate_product)->with('brand',$brand_product);
        }else{
            Cart::destroy();
            $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
            return view('checkout.handcasd')->with('category',$cate_product)->with('brand',$brand_product);
        }
        //return Redirect::to('/payment');
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect::to("/login-checkout");
    }
    public function login_cuctomer(Request $request){
       $email = $request->email_account;
       $password = md5($request->password_account);
       $resuft = DB::table('tbl_cuctomer')->where('cuctomer_email',$email)->where('cuctomer_password',$password)->first();
      
       
       if($resuft){
        Session::put('cuctomer_id',$resuft->cuctomer_id);
        return Redirect::to("/checkout");
       }
       else
       {
        return Redirect::to("/login-checkout");
       }
    }
}
