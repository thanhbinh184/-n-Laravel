@extends('layout')
@section('content')
    <div class="success-message">
        <h2>Cảm ơn bạn đã mua hàng!</h2>
        <p>Đơn hàng của bạn đã được xử lý thành công. Chúng tôi sẽ liên hệ với bạn sớm nhất có thể.</p>
        <a href="{{ url('/home') }}" class="btn btn-primary">Quay lại trang chủ</a>
    </div>
@endsection
