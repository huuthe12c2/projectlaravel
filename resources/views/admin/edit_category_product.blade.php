@extends('admin.admin_layout')
@section('noidungdashboard')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                <div class="panel-body">
                    @foreach($edit_category_product as $key => $edit_value)
                    <div class="position-center">
                    <form role="form" action="{{URL::to('/update_category_product/'.$edit_value->category_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label><br>
                            <input type="text" value="{{$edit_value->category_name}}" name="category_products_name" 
                                class="form-control category_products_name" id="category_products_name" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label><br>
                            <textarea type="text" value="sss" name="category_products_desc" 
                                class="form-control category_products_desc" id="category_products_desc" style="resize: none;" rows="5">{{$edit_value->category_desc}}
                            </textarea>
                        </div>
                        <button type="submit" class="btn update_category_product">Update danh mục</button>
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
                    @endforeach
                </div>
            </section>
         </div>
</div>
@endsection