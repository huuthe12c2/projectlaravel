<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
        <style>
            input.btn.btn-search.btn-sm{
                transition: 0.5s;
            }
            input.btn.btn-search.btn-sm:hover {
            background: red;
            color: #fff;
            transition: 0.5s;
            }   
        </style>
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="#"><img src="{{('public/frontend/images/home/logo.png')}}" alt="" /></a>
                        </div>
                        
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                
                                <?php 
                                $cuctomer_id=Session::get('cuctomer_id');
                                $shipping_id=Session::get('shipping_id');
                                if($cuctomer_id==NULL && $shipping_id==NULL){ ?>
                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                
                                
                                <?php } elseif($cuctomer_id!==NULL && $shipping_id!==NULL) {?>
                                    <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php } else { ?>
                                    <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php } ?>
                                <li><a href="{{URL::to('/show_card')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <?php 
                                    $cuctomer_id=Session::get('cuctomer_id');
                                    if($cuctomer_id==NULL){ ?>
                                  <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <?php } else {?>
                                    <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                    
                                    
                                <?php } ?>
                                <li><a href="{{URL::to('/adminlogin')}}"><i class="fa fa-crosshairs"></i>Admin</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{url('/')}}" class="active">Trang chủ</a></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{URL::to('/search')}}" method="post">
                            {{csrf_field()}}
                            <div class="search_box1">
                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm"/>
                                <input type="submit" class="btn btn-search btn-sm " value="Tìm kiếm" name="search_items">
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Các sản phẩm được nhập từ các thương hiệu lớn. </p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{URL::to('public/frontend/images/home/nam-nu-portland.jpg')}}" class="girl img-responsive" alt="" width="300" height="300"/>
                                    <img src="{{URL::to('public/frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                           
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Các sản phẩm được nhập từ các thương hiệu lớn. </p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{URL::to('public/frontend/images/home/non_luoi_trai_olliste_thanh_lich_1e56.jpg')}}" class="girl img-responsive" alt="" alt="" width="300" height="300"/>
                                    <img src="{{URL::to('public/frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $key=>$value)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$value->category_id)}}">{{$value->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key=>$value)
                                        <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$value->brand_id)}}"> 
                                        <span class="pull-right">(50)</span>{{$value->brand_name}}
                                        </a></li>
                                    @endforeach
                                    
                                   </ul>
                            </div>
                        </div><!--/brands_products-->
                        
                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->
                        
                       
                    
                    </div>
                </div>
                @yield('noidung')
                
            </div>
        </div>
    </section>
    <footer id="footer"><!--Footer-->
        
        
        <div class="footer-widget">
            <div class="container">
                
                        <div class="single-widget">
                            <h2>Gửi mail</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                   
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    
n
  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>