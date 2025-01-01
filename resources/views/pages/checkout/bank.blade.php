<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Thanh toán qua chuyển khoản ngân hàng">
    <meta name="author" content="TB Store">
    <title>TB Store</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .bank-details h3 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .bank-details ul {
            list-style: none;
            padding: 0;
        }
        .bank-details li {
            font-size: 16px;
            margin-bottom: 10px;
            color: #34495e;
        }
        .contact-support {
            margin-top: 40px;
            font-size: 1.2rem;
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .contact-support strong {
            color: #e74c3c;
        }
        .btn-contact {
            background-color: #e74c3c;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-contact:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    @include('inc.header')

    <div class="container">
        <h2 class="text-center">Thanh Toán Qua Chuyển Khoản Ngân Hàng</h2>
        <p class="text-center">Vui lòng thực hiện chuyển khoản đến thông tin ngân hàng dưới đây để hoàn tất đơn hàng của bạn.</p>

        <div class="bank-details">
            <h3>Thông tin tài khoản ngân hàng</h3>
            <ul>
                <li><strong>Tên chủ tài khoản:</strong> {{ $bank_account['name'] }}</li>
                <li><strong>Số tài khoản:</strong> {{ $bank_account['account_number'] }}</li>
                <li><strong>Ngân hàng:</strong> {{ $bank_account['bank_name'] }}</li>
            </ul>
        </div>

        <p class="text-center mt-4">Vui lòng thực hiện chuyển khoản và giữ lại chứng từ chuyển tiền. Sau khi chúng tôi nhận được tiền, đơn hàng của bạn sẽ được xử lý.</p>

        <div class="contact-support">
            <p class="text-center">Nếu có bất kỳ thắc mắc nào, xin vui lòng liên hệ với chúng tôi qua số điện thoại: <strong>0901234567</strong> hoặc email: <strong>support@TBstore.com</strong></p>
        </div>
    </div>

    @include('inc.footer')

    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
</body>
</html>
