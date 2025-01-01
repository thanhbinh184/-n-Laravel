<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="slider-container">
					<!-- Ảnh trong slider -->
					<img src="{{ url('public/frontend/images/trangchu/laptop1.jpg') }}" class="slider-image active">
					<img src="{{ url('public/frontend/images/trangchu/laptop2.jpg') }}" class="slider-image">
					<img src="{{ url('public/frontend/images/trangchu/laptop3.jpg') }}" class="slider-image">		
					<!-- Nút điều hướng -->
					<a class="prev" onclick="changeSlide(-1)">&#10094;</a>
					<a class="next" onclick="changeSlide(1)">&#10095;</a>
				  </div>
			</div>
		</div>
	</section>
	<!--/slider-->
	<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>