<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sách Hay - @yield('title')</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="{{url('/backend')}}/css/plugins/slick/slick.css" rel="stylesheet">
	<link href="{{url('/backend')}}/css/plugins/slick/slick-theme.css" rel="stylesheet">

	<link rel="stylesheet" href="{{url('/backend')}}/css/style.css">
	<link rel="stylesheet" href="{{url('/backend')}}/css/animate.css">

</head>
<style type="text/css">
	img.thumbnai {
		object-fit: cover;
	}
	.intro p {
		overflow: hidden;
		display: -webkit-box;
		-webkit-line-clamp: 3;
		-webkit-box-orient: vertical;
	}
	p > img {
    width: 118px;
}
img.img-new {
    width: 100%;
}
.hotline-phone-ring-wrap {
  position: fixed;
  bottom: 0;
  left: 0;
  z-index: 999999;
}
.hotline-phone-ring {
  position: relative;
  visibility: visible;
  background-color: transparent;
  width: 110px;
  height: 110px;
  cursor: pointer;
  z-index: 11;
  -webkit-backface-visibility: hidden;
  -webkit-transform: translateZ(0);
  transition: visibility .5s;
  left: 0;
  bottom: 0;
  display: block;
}
.hotline-phone-ring-circle {
	width: 85px;
  height: 85px;
  top: 10px;
  left: 10px;
  position: absolute;
  background-color: transparent;
  border-radius: 100%;
  border: 2px solid #e60808;
  -webkit-animation: phonering-alo-circle-anim 1.2s infinite ease-in-out;
  animation: phonering-alo-circle-anim 1.2s infinite ease-in-out;
  transition: all .5s;
  -webkit-transform-origin: 50% 50%;
  -ms-transform-origin: 50% 50%;
  transform-origin: 50% 50%;
  opacity: 0.5;
}
.hotline-phone-ring-circle-fill {
	width: 55px;
  height: 55px;
  top: 25px;
  left: 25px;
  position: absolute;
  background-color: rgba(230, 8, 8, 0.7);
  border-radius: 100%;
  border: 2px solid transparent;
  -webkit-animation: phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
  animation: phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
  transition: all .5s;
  -webkit-transform-origin: 50% 50%;
  -ms-transform-origin: 50% 50%;
  transform-origin: 50% 50%;
}
.hotline-phone-ring-img-circle {
	background-color: #e60808;
	width: 33px;
  height: 33px;
  top: 37px;
  left: 37px;
  position: absolute;
  background-size: 20px;
  border-radius: 100%;
  border: 2px solid transparent;
  -webkit-animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
  animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
  -webkit-transform-origin: 50% 50%;
  -ms-transform-origin: 50% 50%;
  transform-origin: 50% 50%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
}
.hotline-phone-ring-img-circle .pps-btn-img {
	display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
}
.hotline-phone-ring-img-circle .pps-btn-img img {
	width: 20px;
	height: 20px;
}
.hotline-bar {
  position: absolute;
  background: rgba(230, 8, 8, 0.75);
  height: 40px;
  width: 160px;
  line-height: 40px;
  border-radius: 3px;
  padding: 0 10px;
  background-size: 100%;
  cursor: pointer;
  transition: all 0.8s;
  -webkit-transition: all 0.8s;
  z-index: 9;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.1);
  border-radius: 50px !important;
  /* width: 175px !important; */
  left: 33px;
  bottom: 37px;
}
.hotline-bar > a {
  color: #fff;
  text-decoration: none;
  font-size: 15px;
  font-weight: bold;
  text-indent: 50px;
  display: block;
  letter-spacing: 1px;
  line-height: 40px;
  font-family: Arial;
}
.hotline-bar > a:hover,
.hotline-bar > a:active {
  color: #fff;
}
@-webkit-keyframes phonering-alo-circle-anim {
  0% {
    -webkit-transform: rotate(0) scale(0.5) skew(1deg);
    -webkit-opacity: 0.1;
  }
  30% {
    -webkit-transform: rotate(0) scale(0.7) skew(1deg);
    -webkit-opacity: 0.5;
  }
  100% {
    -webkit-transform: rotate(0) scale(1) skew(1deg);
    -webkit-opacity: 0.1;
  }
}
@-webkit-keyframes phonering-alo-circle-fill-anim {
  0% {
    -webkit-transform: rotate(0) scale(0.7) skew(1deg);
    opacity: 0.6;
  }
  50% {
    -webkit-transform: rotate(0) scale(1) skew(1deg);
    opacity: 0.6;
  }
  100% {
    -webkit-transform: rotate(0) scale(0.7) skew(1deg);
    opacity: 0.6;
  }
}
@-webkit-keyframes phonering-alo-circle-img-anim {
  0% {
    -webkit-transform: rotate(0) scale(1) skew(1deg);
  }
  10% {
    -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
  }
  20% {
    -webkit-transform: rotate(25deg) scale(1) skew(1deg);
  }
  30% {
    -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
  }
  40% {
    -webkit-transform: rotate(25deg) scale(1) skew(1deg);
  }
  50% {
    -webkit-transform: rotate(0) scale(1) skew(1deg);
  }
  100% {
    -webkit-transform: rotate(0) scale(1) skew(1deg);
  }
}
@media (max-width: 768px) {
  .hotline-bar {
    display: none;
  }
}
</style>
<body>

	<div class="navbar">
		<div class="container">
			<ul class="nav navbar-nav">
				<li class="">
					<a href="{{ route('home') }}">Trang chủ</a>
				</li>
				<li>

					<a href="{{route('khuyendoc')}}">Khuyên Đọc</a>
				</li>
				

				<li>
					<a href="">Tin tức</a>
				</li>
				<li>
					<a href="">Liên hệ với chúng tôi</a>
				</li>

			</ul>

			<ul class="nav navbar-nav navbar-right ">
				<li id="menucart" class="nav navbar-nav">
					<a href="{{ route('cartview') }}">Cart({{ $cart->total_quantity }})</a>
				</li>
				@if(Auth::guard('cus')->check())
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi {{ Auth::guard('cus')->user()->name }} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{route('profile')}}">Profile</a></li>
						<li><a href="{{route('thaydoipass')}}">Change password</a></li>
						<li><a href="{{ route('order-history') }}">Order history</a></li>
						<li><a href="{{route('home_logout')}}">Logout</a></li>
					</ul>
				</li>
				@else
				<li class="active">
					<a href="{{route('home_login')}}">Login</a>
				</li>
				<li>
					<a href="{{ route('register') }}">Register</a>
				</li>
				
				
				@endif

			</ul>
		</div>
	</div>

	<div class="container">
		
		<div class="your-class">
			@foreach($banners as $banner )
			@if($banner->status == 1)
			<div><img src="{{ url('uploads') }}/{{ $banner->image }}" width="100%" height="300" alt=""></div>
			@endif
			@endforeach

		</div>

	</div>
	<div class="container" style="margin-top: 20px">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
					
						<li><a href=""></a></li>
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<form class="navbar-form navbar-left" role="search" action="{{route('search')}}" method="get">
							<!-- <select name="search_cat" id="inputSearch_cart" class="form-control " >
								<option value="">Tất cả các danh mục</option>
								

								<option value=""></option>
								
								
							</select> -->
							<div class="form-group">
								<input type="text" name="search_key" class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default">Tìm kiếm</button>
						</form>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Danh mục sản phẩm</h3>
					</div>
					<div class="panel-body" >
						<ul class="list-group">
							@foreach($category as $cat)
							
							<a href="{{route('slug-category',['slug'=>$cat->slug])}}" title=""><li class="list-group-item" value="{{ $cat->id }}">{{ $cat->name }}</li></a>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Tin tức sản phẩm</h3>
					</div>
					<div class="panel-body" >
						@foreach($news as $new)		
							<div class="col-md-12">
								<div >
									<a href="#" title=""><img src="{{url('uploads')}}/{{$new->image}}" alt="" width="100%" height="99%"> </a>
								</div>
								<div >
									<h4><a href="{{route('news',['slug'=>$new->slug])}}" title="{!!$new->title!!}">{!!$new->title!!}</a></h4>
									<p class="description"> 
										{!!$new->description!!}
									</p>
									<p>**************************</p>
								</div>
							</div>
						</a>
						@endforeach
						
					</div>
				</div>
				
			</div>
			<div class="col-md-9">
				<div class="row">
					 @if(Session::has('succsess'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ Session::get('succsess') }}
            </div>
            @endif
            @if(Session::has('errorss'))
            <div class="alert alert-warning">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ Session::get('errorss') }}
            </div>
            @endif
					@yield('content')
				</div>
			</div>
		</div>
		
	</div>
	<div class="hotline-phone-ring-wrap">
	<div class="hotline-phone-ring">
		<div class="hotline-phone-ring-circle"></div>
		<div class="hotline-phone-ring-circle-fill"></div>
		<div class="hotline-phone-ring-img-circle">
		<a href="tel:0964396228" class="pps-btn-img">
			<img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Gọi điện thoại" width="50">
		</a>
		</div>
	</div>
	<div class="hotline-bar">
		<a href="tel:0964396228">
			<span class="text-hotline">0964396228</span>
		</a>
	</div>
</div>
	 <div class="container-fluid">
      <div class="container">
        <hr>
        <footer>
          Websize bán sách thương mại điện tử <a href="https://www.facebook.com/profile.php?id=100013507578238" title="" target="#"> Phạm Văn Nam </a>
      </footer>
      </div>
    </div>
    <a id="back-to-top" href="#" class="btn btn-warning btn-lg back-to-top" role="button" title="Click lên đâu trang" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>


	<script src="{{url('/backend')}}/js/popper.min.js"></script>
	<script src="{{url('/backend')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="{{url('/backend')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{{url('/backend')}}/js/inspinia.js"></script>
	<script src="{{url('/backend')}}/js/plugins/pace/pace.min.js"></script>
	<script src="{{url('/backend')}}/js/plugins/slick/slick.min.js"></script>
	<script src="{{url('/backend')}}/js/ajax.js"></script>
	<script src="https://uhchat.net/code.php?f=d3aca8"></script>
	<script>
		$(document).ready(function(){


			$('.product-images').slick({
				dots: true
			});

		});

		$(document).ready(function(){
			$('.your-class').slick({
				autoplay: true,
  				autoplaySpeed: 2000,
			});

		})
		
	</script>




	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
			    <div class="modal fade modal" id="modal-msg">
			    	<div class="modal-dialog">
			    		<div class="modal-content">
			    			<div class="modal-header">
			    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    			</div>
			    			<div class="modal-body">
			    				<p>thêm thành công sản phẩm</p>
			    			</div>
			    			<div class="modal-footer">
			    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    			</div>
			    		</div>
			    	</div>
			    </div>

	
</body>
</html>