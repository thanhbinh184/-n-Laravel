@extends('admin_layout')
@section('admin_content')

<div class="panel panel-default">
    <div class="panel-heading">
        Chi Tiết Đơn Hàng #{{ $order->orders_id }}
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <h4><b>Thông tin khách hàng:</b></h4>
                <ul>
                    <li><b>Tên khách hàng:</b> {{ $order->customer->customer_name }}</li>
                    <li><b>Email:</b> {{ $order->customer->customer_email }}</li>
                    <li><b>Địa chỉ:</b> {{ $order->shipping->shipping_address }}</li>
                    <li><b>Số điện thoại:</b> {{ $order->shipping->shipping_phone }}</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4><b>Thông tin đơn hàng:</b></h4>
                <ul>
                    <li><b>Ngày đặt hàng:</b> {{ $order->order_date }}</li>
                    <li><b>Tổng giá trị:</b> {{ number_format($order->total_price, 0, ',', '.') }} VND</li>
                    <li><b>Trạng thái:</b> {{ $order->order_status }}</li>
                </ul>
            </div>
        </div>

        <h4><b>Chi Tiết Đơn Hàng:</b></h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetails as $detail)
                <tr>
                    <td>{{ $detail->product->product_name }}</td>
                    <td><img src="{{ asset('uploads/product/'.$detail->product->product_image) }}" width="50"></td>
                    <td>{{ $detail->product_quantity }}</td>
                    <td>{{ number_format($detail->product_price, 0, ',', '.') }} VND</td>
                    <td>{{ number_format($detail->product_quantity * $detail->product_price, 0, ',', '.') }} VND</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

