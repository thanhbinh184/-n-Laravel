@extends('layout')
@section('content')
<!--Danh mục sản phẩm-->
<div class="features_items">
                        @foreach($category_name as $key => $name)
						<h2 class="title text-center">{{$name->category_name}}</h2>
                        @endforeach
						@foreach($category_by_id as $key => $product)
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
						</a>
						@endforeach
					</div><!--Danh mục sản phẩm-->
					@endsection