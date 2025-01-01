@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Sản Phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
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
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Hình Ảnh Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Thương Hiệu</th>
            <th>Tình Trạng</th>
            <th>Ngày Thêm</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
       <tbody>
        @forelse ($all_product as $product)
        <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_price }}</td>
            <td><img src="{{ asset('public/uploads/products/' . $product->product_image) }}" height="100" width="100"></td>
            <td>{{ $product->category_name }}</td>
            <td>{{ $product->brand_name }}</td>
            <td>{{ $product->product_status == 0 ? 'Hết Hàng' : 'Còn Hàng' }}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <a href="{{ route('edit.product', $product->product_id) }}" class="active">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a href="{{ route('delete.product', $product->product_id) }}" class="active"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
                    <i class="fa fa-times text-danger text"></i>
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">Không có sản phẩm nào</td>
        </tr>
    @endforelse
</tbody>

      </table>
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