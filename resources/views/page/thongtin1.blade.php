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
			<form action="{{route('thongtindonhang')}}" method="get">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-12">
						<h4>Thông tin đơn hàng</h4>
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr align="center">
							<th>Bill Id</th>
							<th>Sản phẩm</th>
							<th>Số Lượng</th>
							<th>Đơn Gía</th>
							<th>Tổng Tiền</th>
							<th>Ngày Đặt</th>
							<th>Phương thức TT</th>
						</tr>
						</thead>
						<tbody>
						 @foreach($thongtin1 as $bd)
						 <tr class="odd gradeX" align="center">
							<td>{{$bd->bills->id}}</td>
							<td>
								<p>{{$bd->products->name}}</p>
								<img width ="100px" src="source/image/product/{{$bd->products->image}}" />
							</td>
							<td>{{$bd->quantity}}</td>
							<td>{{$bd->unit_price}}</td>
							<td>{{$bd->bills->total}}</td>
							<td>{{$bd->bills->date_order}}</td>
							<td>{{$bd->bills->payment}}</td>
							@endforeach
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
