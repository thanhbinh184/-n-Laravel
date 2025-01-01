@extends('layout')
@section('content')
@foreach ($product_details as $key => $value )
<div class="product-details"><!--Chi tiết sản phẩm-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('public/uploads/products/' .$value->product_image)}}" alt="" />
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>ID: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<form action="{{URL::to('/save_cart')}}" method="POST">
									{{ csrf_field() }}
									<span>
										<span>{{number_format($value->product_price). 'VND'}}</span>
										<label>Số Lượng:</label>
										<input name="qty" type="number" min="1" value="1" />
										<input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
										<br>
										<button type="submit" class="btn btn-fefault cart">
											Thêm giỏ hàng
										</button>
									</span>
								</form>
								<p><b>Tình Trạng:</b> {{$value->product_status}}</p>
								<p><b>Thương Hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh Mục:</b> {{$value->category_name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/Chi tiết sản phẩm-->
@endforeach
@endsection