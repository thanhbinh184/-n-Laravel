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
    
	<!-- Thêm font "Creepster" từ Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="icon" type="image/png" href="/images/ico/new-favicon.png">       
<link rel="shortcut icon" href="/images/ico/new-favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon" href="/images/ico/apple-touch-icon-57-precomposed.png">

</head><!--/head-->

<body>

@include('inc.header')
@include('inc.slider')

	<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh Mục</h2>
                    <div class="panel-group category-products" id="danhmuc"><!--category-products-->
                        @foreach($category as $key => $cate)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
									<a href="{{URL::to('/danh_muc_san_pham/'.$cate->category_id)}}" class="category-link">
                                        <span class="badge pull-right"><i class=""></i></span>
                                        {{$cate->category_name}}
                                    </a>

                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div><!--/category-products-->

                    <!-- Thương Hiệu -->
                    <div class="brands_products"><!--brands_products-->
                        <h2>Thương Hiệu</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($brand as $key => $brand)
                                    <li><a href="{{URL::to('/thuong_hieu_san_pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li> <!-- Hiển thị tên thương hiệu -->
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                    
                    <!-- Quảng cáo -->
                    <div class="large right" data-banner-page="Allsite" data-banner-loc="Sticky Banner_Right">
                        <a href="/pages/laptop-gaming" target="_blank" class="aspect-ratio" aria-label="Laptop Gaming" style="--height-img:453; --width-img:150;">
                            <img src="https://file.hstatic.net/200000722513/file/thang_11_side_web_laptop_gaming.png" alt="Laptop Gaming">
                        </a>
                    </div>
                </div>
            </div> <!-- /.col-sm-3 -->
            
            <div class="col-sm-9">
                @yield('content')
            </div> <!-- /.col-sm-9 -->
        </div>
    </div>
</section>

	
@include('inc.footer')
  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>