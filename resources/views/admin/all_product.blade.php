@extends('admin.admin_layout')
@section('noidungdashboard')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Giới thiệu</th>
            <th>Nội dung</th>
            <th>Giá</th>
            <th>Thương hiệu</th>
            <th>Danh mục</th>
            <th>Hình ảnh</th>
            <th>Hiển thị/Ẩn</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key=>$item_product)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$item_product->product_name}}</td>
            <td><span class="text-ellipsis">{{$item_product->product_desc}}</span></td>
            <td><span class="text-ellipsis">{{$item_product->product_content}}</span></td>
            <td><span class="text-ellipsis">{{$item_product->product_price}}</span></td>
            {{-- <td><span class="text-ellipsis">danh muc</span></td> --}}
            <td><span class="text-ellipsis">{{$item_product->brand_name}}</span></td>
            {{-- <td><span class="text-ellipsis">thuonghieu</span></td> --}}
            <td><span class="text-ellipsis">{{$item_product->category_name}}</span></td>
            
            <td><img src="public/upload/product/{{$item_product->product_image}}" alt="" width="100px" height="100px"></td>
            <td><span class="text-ellipsis">
             
              <?php if($item_product->product_status == 1) {?>

                <a href="{{route('product.hide', $item_product->product_id)}}">Hiện</a>
              <?php 
               } else {?>
                <a href="{{route('product.show', $item_product->product_id)}}">Ẩn</a>
                
              <?php }?>
            </span></td>
            
            <td>
              <a href="{{URL::to('/edit_product/'.$item_product->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="{{URL::to('/delete_product/'.$item_product->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
      
          @endforeach
        </tbody>
      </table>
      <?php  
                  $message = Session::get('message');//lấy dòng giá trị massege
                 
                  if($message)//nếu có tồn tại message thì in ra
                  {
                      echo '<span class="text-alert">'.$message.'</span>';
                      Session::put('message',null); //chỉ hiển thị một lần
                  }
                  
                  ?>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection