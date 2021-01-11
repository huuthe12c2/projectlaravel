@extends('admin.admin_layout')
@section('noidungdashboard')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    <form role="form" action="{{url('/save_category_product')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label><br>
                            <input type="text" name="category_products_name" class="form-control category_products_name" id="category_products_name" placeholder="Nhập tên danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label><br>
                            <textarea type="text" name="category_products_desc" class="form-control category_products_desc" id="category_products_desc" style="resize: none;" rows="5" placeholder="Mô tả danh mục..."></textarea>
                        
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="exampleInputFile">Hiển thị</label><br>
                            <select name="category_products_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn add_category_products">Thêm danh mục</button>
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