<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    //kiểm tra chặn nhập đường dẫn vào admin mà chưa login
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
    public function index(){
        $this->AuthLogin();
        return view('admin.admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    
    //login logout======================================================================================
    public function login(Request $request){
        $this->AuthLogin();
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        
        $resuft= DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();//lấy limit giới hạn 1 user
        //    kiểm tra nếu kết quả đúng thì 
        if($resuft){
            Session::put('admin_name',$resuft->admin_name);//lấy dữ liệu name 
            Session::put('admin_id',$resuft->admin_id);//lấy dữ liệu id 
            return view('admin.dashboard');//load tới trang
        }
        else{
            Session::put('message',"Tài khoản hoặc mật khẩu bị sai");//hiển thị thông báo tài khoản sai
            return view('admin.admin_login');//load về trang login
        }
    }
    public function logout(Request $request){
        $this->AuthLogin();
        Session::put('admin_name',null);//lấy dữ liệu name 
        Session::put('admin_id',null);//lấy dữ liệu id 
        return view('admin.admin_login');//load về trang login
    }
   
}
