@extends('master')
@section('noidung')
<div class="col-sm-9 padding-right">
<section id="cart_items">
  
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{url('/')}}">Trang chủ</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        
        <div class="checkout-options">
            <h3>Thanh toán</h3>
            
        </div><!--/checkout-options-->


        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin gửi hàng</p>
                        <div class="form-one">
                            <form action="{{URL::to('/save_checkout_cuctomer')}}" method="post">
                                {{csrf_field()}}
                                <input type="text" name="shipping_email" placeholder="Email">
                                <input type="text" name="shipping_name" placeholder="Họ và Tên">
                                <input type="text" name="shipping_andress" placeholder="Địa chỉ">
                                <input type="text" name="shipping_phone" placeholder="Phone">
                                <textarea name="shipping_message" id="" cols="30" rows="10" placeholder="Ghi chú"></textarea>
                                <input type="submit" value="Gửi" name="update_qty" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                        
                    </div>
                </div>
                				
            </div>
        </div>
        

        
        

</section> <!--/#cart_items-->
</div>
@endsection