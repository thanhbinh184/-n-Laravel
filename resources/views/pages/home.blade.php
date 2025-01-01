@extends('layout')
@section('content')
<!--features_items -- Sản phẩm mới nhất-->
					<div class="features_items">
						<h2 class="title text-center">SẢN PHẨM MỚI NHẤT </h2>
						@foreach($all_product as $key => $product)
						<a href="{{URL::to('/chi_tiet_san_pham/' .$product->product_id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('public/uploads/products/'.$product->product_image)}}" alt="" />
											<h2>{{number_format($product->product_price)}}₫</h2>
                                    		<p>{{ $product->product_name }}</p>
										</div>
								</div> 
							</div>
						</div>
						@endforeach
					</div><!--features_items -- Sản phẩm mới nhất-->
					@endsection