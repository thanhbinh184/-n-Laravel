<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TB Store</title>
    <link href="{{('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{('public/frontend/css/style.css')}}" rel="stylesheet">
	

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
<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Liên <strong>Hệ</strong></h2>    			    				    				
					<div id="gmap" class="contact-map" style="width:100%; height:400px;">
						<!-- Nhúng bản đồ Google Maps -->
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.3651338657987!2d106.69204877451817!3d10.859808157651257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529c17978287d%3A0xec48f5a17b7d5741!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBOZ3V54buFbiBU4bqldCBUaMOgbmggLSBDxqEgc-G7nyBxdeG6rW4gMTI!5e0!3m2!1svi!2s!4v1734718086578!5m2!1svi!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>

					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Liên Hệ</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Tên">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Chủ Đề">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Tin nhắn của bạn ở đây"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gửi">
				            </div>
				        </form>
	    			</div>
	    		</div>

	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Thông Tin Liên Hệ</h2>
	    				<address>
	    					<p>TB Store</p>
							<p>331 An Phú Đông</p>
							<p>TP. Hồ Chí Minh</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Mạng Xã Hội</h2>
							<ul>
							<li><img src="public/frontend/fonts/facebook.svg" alt="Facebook" /></li>
							<li><img src="public/frontend/fonts/youtube.svg" alt="YouTube" /></li>
							<li><img src="public/frontend/fonts/twitter.svg" alt="Twitter" /></li>
							<li><img src="public/frontend/fonts/google.svg" alt="Google" /></li>
							</ul>
						</div>
					</div>
				</div>		
	    	</div>  
    	</div>	
    </div><!--/#Liên hệ-->
	
	@include('inc.footer')
	

    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
	</body>
</html>