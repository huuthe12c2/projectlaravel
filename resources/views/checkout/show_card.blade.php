@extends('master')
@section('noidung')
<div class="col-sm-9 padding-right">
<section id="cart_items">

        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{url('/')}}">Trang chủ</a></li>
              <li class="">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <?php 
                 $content=Cart::content();
                
                ?>
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('public/upload/product/'.$v_content->options->product_image)}}" width="50" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            <p>Web ID: {{$v_content->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).' VNĐ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update_cart_quatity')}}" method="post">
                                    {{csrf_field()}}
                                    <input class="cart_quantity_input" min="1" type="number" name="quantity" value="{{$v_content->qty}}"  size="2">
                                    <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                    <input type="submit" value="update" name="update_qty" class="btn btn-default btn-sm">
                                </form>
                     
                               
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php 
                                $sub_total=$v_content->price*$v_content->qty;
                                echo number_format($sub_total).' VNĐ';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete_to_cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

</section> <!--/#cart_items-->
<section id="do_action">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div> --}}
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span>{{Cart::total().' VNĐ'}}</span></li>
                        <li>Thuế <span>{{Cart::tax().' VNĐ'}}</span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>
                            <?php 
                                $thue=Cart::total();
                                $tong=Cart::total();
                                $thanhtien=$thue+$tong;
                                echo $thanhtien.' VNĐ';
                            ?>
                           
                        
                        </span></li>
                    </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        <?php 
                        $cuctomer_id=Session::get('cuctomer_id');
                        if($cuctomer_id==NULL){ ?>
                        <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                        
                        <?php } else {?>
                            <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                           
                        <?php } ?>
                        
                </div>
            </div>
    </div>
</section><!--/#do_action-->
</div>
@endsection