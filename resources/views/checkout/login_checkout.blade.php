@extends('master')
@section('noidung')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập tài khoản</h2>
                    <form action="{{URL::to('/login-cuctomer')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" name="email_account" placeholder="Tài khoản" />
                        <input type="password" name="password_account" placeholder="Password" />
                        <span>
                            <input type="checkbox" name="checkbox_accout" class="checkbox"> 
                            Ghi nhớ
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng ký mới!</h2>
                    <form action="{{URL::to('/register_cuctomer')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" name="cuctomer_name" placeholder="Họ và tên"/>
                        <input type="email" name="cuctomer_email" placeholder="Email Address"/>
                        <input type="password" name="cuctomer_password" placeholder="Password"/> 
                        <input type="text" name="cuctomer_phone" placeholder="Phone">
                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection