<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>TB Store</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
@include('inc.header')


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/home')}}">Trang Chủ</a></li>
				  <li class="active">Giỏ Hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
				use Gloudemans\Shoppingcart\Facades\Cart;
				$content = Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Sản Phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số Lượng</td>
							<td class="total">Tổng Tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
							<tr>
								<td class="cart_product">
									<a href=""><img src="{{URL::to('public/uploads/products/'.$v_content->options->image)}}" width="30%" alt="" /></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{$v_content->name}}</a></h4>
									<p>ID: {{$v_content->id}}</p>
								</td>
								<td class="cart_price">
									<p>{{number_format($v_content->price).' '.'VND'}}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href="{{ route('cart.increase', $v_content->rowId) }}"> + </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="{{ $v_content->qty }}" autocomplete="off" size="2" readonly>
										<a class="cart_quantity_down" href="{{ route('cart.decrease', $v_content->rowId) }}"> - </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">
									<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal).' '.'VND';
									?>
									</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="{{ route('cart.remove', $v_content->rowId) }}">
										<i class="fa fa-times"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Bạn muốn làm gì tiếp theo?</h3>
				<p>Chọn nếu bạn có mã giảm giá hoặc điểm thưởng mà bạn muốn sử dụng hoặc muốn ước tính chi phí giao hàng.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::priceTotal(0,',','.') .' '.'VND'}}</span></li>
							<li>Phí vận chuyển <span>Miễn phí</span></li>
							<li>Tổng tiền <span>{{Cart::priceTotal(0,',','.') .' '.'VND'}}</span></li>
						</ul>
						<?php
								use Illuminate\Support\Facades\Session;

								$customer_id = Session::get('customer_id');
								if ($customer_id != NULL) {

								?>
								<a href="{{URL::to('/checkout')}}" class="btn btn-default check_out">Thanh Toán</a>
								<?php
							}else{
								?>
								<a href="{{URL::to('/login_checkout')}}" class="btn btn-default check_out">Thanh Toán</a>
								<?php
								
							}
							?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	@include('inc.footer')

	<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>

</body>
</html>