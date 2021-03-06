@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<div class="container">
	<div id="content">
		<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<h2><div style="color:#FF0000" class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div></h2>
				<div class="col-sm-12">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								@if(Session::has('cart'))
								@foreach($product_cart as $cart)
								<!--  one item	 -->
									<div class="media">
										<img width="25%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
										<div class="media-body">
											<h5><p class="font-large">{{$cart['item']['name']}}</p></h5>
											<h6><span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price'])}} đồng</span>
											<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span></h6>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								@endif
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đồng</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>

							<li>
								<div class="your-order-head" style="background-color:#FFCC66"><h5>Thông tin của bạn</h5></div><br>
								<div class="form-block">
									<label for="name">Họ tên*</label>
									<input type="text" name="name" value="{{$dat_hang->full_name}}" >
								</div>
								<div class="form-block">
									<label>Giới tính </label>
									<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
									<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

								</div>

								<div class="form-block">
									<label for="email">Email*</label>
									<input type="email" id="email" name="email" value="{{$dat_hang->email}}"  required>
								</div>

								<div class="form-block">
									<label for="adress">Địa chỉ*</label>
									<input type="text" id="address" name="address" value="{{$dat_hang->address}}" required>
								</div>


								<div class="form-block">
									<label for="phone">Điện thoại*</label>
									<input type="text" id="phone" name="phone" value="{{$dat_hang->phone}}" required>
								</div>

								<div class="form-block">
									<label for="notes">Ghi chú</label>
									<textarea id="notes" name="notes"></textarea>
								</div>
							</li>

							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>
									</li>
									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng TMCP Tiền Phong
										</div>
									</li>
								</ul>
						</div>
						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
