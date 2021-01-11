@extends('master')
@section('noidung')

            <div class="col-sm-9 padding-right"> 
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Sản phẩm mới nhất</h2>
                    @foreach($product as $key=>$value)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <a href="{{URL::to('/detail/'.$value->product_id)}}">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{URL::to('public/upload/product/'.$value->product_image)}}" height="200" />
                                        
                                        <h2>{{$value->product_price}}</h2>
                                        <p>{{$value->product_name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                    </div>
                                    
                            </div>
                            </a>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div><!--features_items-->
                
                
            </div>

@endsection