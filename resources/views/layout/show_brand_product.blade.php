@extends('master')
@section('noidung')
            <div class="col-sm-9 padding-right"> 
                <div class="features_items"><!--features_items-->
                    @foreach ($brand_name as $key=>$item)
                    <h2 class="title text-center">{{$item->brand_name}}</h2>
                    @endforeach
                    @foreach($brand_by_id as $key=>$value)
                    
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <a href="{{URL::to('/detail/'.$value->product_id)}}">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{URL::to('public/upload/product/'.$value->product_image)}}" height="200" />
                                        
                                        <h2>{{$value->product_price}}</h2>
                                        <p>{{$value->product_name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    {{-- <div class="product-overlay">
                                        <div class="overlay-content">
                                            
                                            <h2>{{$value->product_price}}</h2>
                                            <p>{{$value->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div> --}}
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