@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Đơn Hàng
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
            <th>Mã Đơn Hàng</th>
            <th>Khách Hàng</th>
            <th>Trạng Thái</th>
            <th>Tổng Tiền</th>
            <th>Ngày Đặt</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>

          @foreach ($orders as $order)
          
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $order->orders_id }}</td>
            <td>{{ $order->customer->customer_name }}</td>
            <td>
              <span class="text-ellipsis">
                @if($order->orders_status == 'pending')
                  Chờ xử lý
                @elseif($order->orders_status == 'completed')
                  Đã hoàn thành
                @elseif($order->orders_status == 'cancelled')
                  Đã hủy
                @endif
              </span>
            </td>
            <td>{{ number_format($order->total_price) }} VND</td>
            <td>{{ $order->order_date }}</td>
            <td>
              <a href="{{ route('delete.order', $order->orders_id) }}" class="active" ui-toggle-class=""
                 onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{ $orders->firstItem() }}-{{ $orders->lastItem() }} của {{ $orders->total() }} đơn hàng</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{ $orders->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
