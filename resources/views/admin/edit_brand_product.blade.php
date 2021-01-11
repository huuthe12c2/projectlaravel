@extends('admin.admin_layout')
@section('noidungdashboard')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu
                </header>
                <div class="panel-body">
                    @foreach($edit_brand_product as $key => $edit_value)
                    <div class="position-center">
                    <form role="form" action="{{URL::to('/update_brand_product/'.$edit_value->brand_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label><br>
                            <input type="text" value="{{$edit_value->brand_name}}" name="brand_products_name" 
                                class="form-control brand_products_name" id="brand_products_name" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giới thiệu</label><br>
                            <textarea type="text" value="sss" name="brand_products_introduce" 
                                class="form-control brand_products_introduce" id="brand_products_introduce" style="resize: none;" rows="5">{{$edit_value->brand_introduce}}
                            </textarea>
                        </div>
                        <button type="submit" class="btn update_brand_product">Update danh mục</button>
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