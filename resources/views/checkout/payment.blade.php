@extends('master')
@section('noidung')
<div class="col-sm-9 padding-right">
<section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{url('/')}}">Trang chủ</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->

        
        <div class="checkout-options">
            <h3>Xem lại giỏ hàng</h3>
            
        </div><!--/checkout-options-->  
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
        <h3 style="margin-bottom:40px;">Chọn hình thức thanh toán</h3>
        <form action="{{URL::to('/order-place')}}" method="post">
            {{csrf_field()}}
            <div class="payment-options">
                <span>
                    <label><input name="payment_option" value="1" type="checkbox">Trả bằng thẻ ATM</label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="checkbox">Nhận bằng tiền mặt</label>
                </span>
                <input type="submit" value="Đặt hàng" name="3" class="btn btn-primary btn-sm">
            </div>
            
        </form>
        
</section> <!--/#cart_items-->
</div>
@endsection