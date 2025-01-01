<!-- Thêm Font Awesome vào phần head -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">


<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ route('home') }}"><img src="public/frontend/images/home/logo.png" alt="" /></a>
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<?php
								use Illuminate\Support\Facades\Session;

								$customer_id = Session::get('customers_id');
								if ($customer_id != NULL) {

								?>
								<li><a href="{{URL::to('/checkout')}}"><img src="public/frontend/fonts/credit-card.svg" alt=""/> Thanh Toán</a></li>
								<?php
							}else{
								?>
								<li><a href="{{URL::to('/login_checkout')}}"><img src="public/frontend/fonts/credit-card.svg" alt=""/> Thanh Toán</a></li>
								<?php
								
							}
							?>
								<?php

								$customer_id = Session::get('customers_id');
								if ($customer_id != NULL) {

								?>
								<li><a href="{{URL::to('/logout_checkout')}}"><img src="public/frontend/fonts/person.svg" alt=""/> Đăng Xuất</a></li>

								<?php
							}else{
								?>
								<li><a href="{{URL::to('/login_checkout')}}"><img src="public/frontend/fonts/person.svg" alt=""/> Đăng Nhập</a></li>
								<?php
								
								}
								?>

								
								<li><a href="{{ route('show_cart') }}"><img src="public/frontend/fonts/cart4.svg" alt=""/> Giỏ Hàng</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ route('home') }}" class="active">Trang Chủ</a></li>
								<li class="dropdown"><a href="#">Sản Phẩm <img src="public/frontend/fonts/caret-down.svg" alt=""/></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="{{ url('/danh_muc_san_pham/2') }}">Điện thoại</a></li>
										<li><a href="{{ url('/danh_muc_san_pham/1') }}">Laptop</a></li> 
										<li><a href="{{ url('/danh_muc_san_pham/3') }}">Phụ kiện</a></li> 
                                    </ul>
                                </li> 
								<li><a href="{{ route('about') }}">Giới Thiệu<i></i></a>
                                </li> 
								<li><a href="{{ route('contact') }}">Liên hệ </a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
					<form action="{{ route('search') }}" method="GET" class="d-flex">
						<input class="form-control me-2" type="search" name="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" required> 
					</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->