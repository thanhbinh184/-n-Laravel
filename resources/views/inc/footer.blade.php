<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
	
<footer id="footer"><!--Footer-->
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ route('contact') }}">Liên Hệ</a></li>
								<li><a href="#">Thay đổi vị trí</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Mua Sắm Nhanh</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ url('/danh_muc_san_pham/2') }}">Điện Thoại</a></li>
								<li><a href="{{ url('/danh_muc_san_pham/1') }}">Laptop</a></li>
								<li><a href="{{ url('/danh_muc_san_pham/3') }}">Phụ Kiện</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính Sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ route('about') }}">Điều Khoản Sử Dụng</a></li>
								<li><a href="{{ route('about') }}">Chính sách bảo mật</a></li>
								<li><a href="{{ route('about') }}">Chính sách hoàn tiền</a></li>
								<li><a href="{{ route('about') }}">Hệ thống thanh toán</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Giới Thiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ route('about') }}">Thông tin cửa hàng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Giới Thiệu</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Địa chỉ email của bạn" />
								<br>
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Nhận thông tin cập nhật mới nhất từ ​​<br />trang web của chúng tôi và tự cập nhật thông tin cho mình...</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2024. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->