@extends('admin.admin_layout')
@section('noidungdashboard')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục sản phẩm
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
              <th>Tên thương hiệu</th>
              <th>Giới thiệu</th>
              <th>Hiển thị/Ẩn</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($allbrand_product as $key=>$item_brand)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$item_brand->brand_name}}</td>
              <td><span class="text-ellipsis">{{$item_brand->brand_introduce}}</span></td>
              <td><span class="text-ellipsis">
                <?php if($item_brand->brand_status==1) {?>
                  <a href="{{route('brand.hide', $item_brand->brand_id)}}">Hiện</a>
                {{-- <a href="{{URL::to('/show_brand/'.$item_brand->id)}}">Hiện</a> --}}
                <?php 
                 } else {?>
                  <a href="{{route('brand.show', $item_brand->brand_id)}}">Ẩn</a>
                <?php }?>
              </span></td>
              <td>
                <a href="{{URL::to('/edit_brand_product/'.$item_brand->brand_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có chắc muốn xóa dnah mục này không?')" href="{{URL::to('/delete_brand_product/'.$item_brand->brand_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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