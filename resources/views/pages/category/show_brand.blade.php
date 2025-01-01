@extends('layout')
@section('content')
<!--Thương hiệu sản phẩm-->
<div class="features_items">
                        @foreach($brand_name as $key => $name)
						<h2 class="title text-center">{{$name->brand_name}}</h2>
                        @endforeach
						@foreach($brand_by_id as $key => $pro)
						<a href="{{URL::to('/chi_tiet_san_pham/' .$pro->product_id)}}">
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{URL::to('public/uploads/products/'.$pro->product_image)}}" alt="" />
												<h2>{{number_format($pro->product_price)}}₫</h2>
												<p>{{ $pro->product_name }}</p>
											</div>
									</div> 
								</div>
							</div>
						</a>
						@endforeach
					</div><!--Thưuong hiệu sản phẩm-->
					@endsection