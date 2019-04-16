<div id="header">
  <div class="header-top" >
    <div class="container" style="background-image: url('source/image/12.jpg');"  >
      <div class="beta-comp">
        <form role="search" method="get" id="searchform" action="{{ route('search') }}">
          <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
          <button class="icon-search" type="submit" id="searchsubmit"></button>
        </form>
          <!-- <a href="index" id="logo"><img src="source/image/baner.jpg" width="200px" height="200px" alt=""></a> -->
      </div>

      <div class="pull-right auto-width-right" >

					<ul class="top-details menu-beta l-inline" >
					@if(Auth::check())
						<li><a href="{{route('thongtin')}}">Chào bạn {{Auth::user()->full_name}}</a></li>
            <li><a href="{{route('thongtindonhang')}}">Đơn hàng</a></li>
						<li><a href="{{route('logout')}}">Đăng xuất</a></li>
					@else
						<li><a href="{{route('signin')}}">Đăng kí</a></li>
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
					@endif
          <li><a href="ad/dangnhap">Admin</a></li>
          <li>
            <div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
                @if(Session::has('cart'))
							@foreach($product_cart as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}}
                        @else {{number_format($product['item']['promotion_price'])}} @endif</span></span>
										</div>
									</div>
								</div>
							@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đồng</span></div>
									<div class="clearfix"></div>
									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="dat-hang" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
                @endif
							</div>
						</div>
          </li>
					</ul>
				</div>
      <div class="clearfix"></div>
    </div> <!-- .container -->
  </div> <!-- .header-top -->
  <div class="header-body">
    <div class="container beta-relative">

      <div class="pull-right beta-components space-left ov">
        <div class="space10">&nbsp;</div>


        <div class="beta-comp">

						 <!-- .cart -->

					</div>
      </div>
      <div class="clearfix"></div>
    </div> <!-- .container -->
  </div> <!-- .header-body -->
  <div class="header-bottom" style="background-color: #663300;" >
    <div class="container">
      <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
      <div class="visible-xs clearfix"></div>
      <nav class="main-menu">
        <ul class="l-inline ov">
          <li><a href="index">Trang chủ</a></li>
          <li><a>Loại Sản Phẩm</a>
            <ul class="sub-menu">
              @foreach($loai_sp as $loai)
              <li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="khuyen-mai">Khuyến mãi</a></li>
          <li><a href="gioi-thieu">Giới thiệu</a></li>
          <li><a href="lien-he">Liên hệ</a></li>
        </ul>
        <div class="clearfix"></div>
      </nav>
    </div> <!-- .container -->
  </div> <!-- .header-bottom -->
</div> <!-- #header -->
<script type="text/javascript" src="js/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/xzoom.css" media="all" />
<script src="source/assets/dest/js/jquery.min.js"></script>
