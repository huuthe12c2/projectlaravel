@extends('admin.admin_layout')
@section('noidungdashboard')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    <form role="form" action="{{url('/save_product')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label><br>
                            <input type="text" name="product_name" class="form-control products_name" id="products_name" placeholder="Nhập tên sản phẩm...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giới thiệu sản phẩm</label><br>
                            <textarea type="text" name="product_desc" class="form-control product_desc" id="product_desc" style="resize: none;" rows="5" placeholder="Mô tả sản phẩm..."></textarea>
                        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label><br>
                            <textarea type="text" name="product_content" class="form-control product_content" id="product_content" style="resize: none;" rows="5" placeholder="Content sản phẩm..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm</label><br>
                            <select name="category_id" class="form-control input-sm m-bot15">
                                @foreach ($cate_products as $key=>$item)
                                <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thương hiệu sản phẩm</label><br>
                            <select name="brand_id" class="form-control input-sm m-bot15">
                                @foreach ($brand_products as $key=>$item)
                                <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price sản phẩm</label><br>
                            <input type="text" name="product_price" class="form-control product_price" id="product_price" placeholder="Nhập giá sản phẩm...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hiển thị</label><br>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh sản phẩm</label><br>
                            <input type="file" name="product_image" class="form-control product_image" id="product_image">
                        </div>
                        <button type="submit" class="btn add_products">Thêm sản phẩm</button>
                    </form>
                    <?php  
                    $message = Session::get('message');//lấy dòng giá trị massege
                   
                    if($message)//nếu có tồn tại message thì in ra
                    {
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null); //chỉ hiển thị một lần
                    }
                    
                    ?>
                    </div>

                </div>
            </section>
         </div>
</div>
@endsection