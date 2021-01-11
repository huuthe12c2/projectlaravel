<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $new_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(3)->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->get();
        return view('layout.home')->with('category',$cate_product)->with('brand',$brand_product)->with('product',$new_product)->with('allproduct',$all_product);
    }
    //show front-end product_category
    public function detail_category($category_id){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_by_id=DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id', $category_id)->get();
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        return view('layout.show_cate_product')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
        
    }
    //show front-end product_brand
    public function detail_brand($brand_id){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $brand_by_id=DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_product.brand_id', $brand_id)->get();
        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();
        return view('layout.show_brand_product')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
    //detail
    public function detail_product($product_id){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $detail_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();
        
        foreach($detail_product as $key=> $value)
        {
            $category_id = $value->category_id;
        }
        $related_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();

        return view('layout.show_detail')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('detail_product',$detail_product)->with('related_product',$related_product);
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $search_product=DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        //$all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->get();
        return view('layout.search')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('search_product',$search_product);
   
    }
}