@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Thông tin</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index">Home</a> / <span>Thông tin</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<form action="{{route('thongtin')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{$err}}
							@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Thông tin tài khoản</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="email">Email address(*) : </label>
							<input type="email" name="email" value="{{$thongtin->email}}" readonly required>
						</div>
						<div class="form-block">
							<label for="your_last_name">Fullname(*) : </label>
							<input type="text" name="fullname" value="{{$thongtin->full_name}}" required>
						</div>
						<div class="form-block">
							<label for="adress">Address(*) : </label>
							<input type="text" name="address" value="{{$thongtin->address}}" required>
						</div>
						<div class="form-block">
							<label for="phone">Phone(*) : </label>
							<input type="text" name="phone" value="{{$thongtin->phone}}" required>
						</div>
						<div class="form-block">
							<label for="phone">New Password(*) : </label>
							<input type="password" name="password" value="{{$thongtin->password}}" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Cập nhật</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
