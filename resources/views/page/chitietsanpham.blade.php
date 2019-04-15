@extends('master')
@section('content')
<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title">Sản phẩm</h6>
    </div>
    <div class="pull-right">
      <div class="beta-breadcrumb font-large">
        <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>

<div class="container">
  <div id="content">
    <div class="row">
      <div class="col-sm-9">

        <div class="row">
          <div class="col-sm-4">
            <img src="source/image/product/{{$sanpham->image}}" data-imagezoom="true" class="align-center img-responsive" alt="">
          </div>
          <div class="col-sm-8">
            <div class="single-item-body">
              <p class="single-item-title"><h2>{{$sanpham->name}}</h2></p><br>
              <p class="single-item-price">
                @if($sanpham->promotion_price != 0)
                <h4><span class="flash-del">{{number_format($sanpham->unit_price)}} VNĐ</span>
                <span class="flash-sale">{{number_format($sanpham->promotion_price)}} VNĐ</span></h4>
                @else
                <h4><span>{{number_format($sanpham->unit_price)}} VNĐ</span></h4>
                @endif
              </p>
            </div>

            <div class="clearfix"></div>
            <p>Số lượng:</p>
            <div class="single-item-options">
              <select class="wc-select" name="color">
                <option>Số lượng</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>

        <div class="space40">&nbsp;</div>
        <div class="woocommerce-tabs">
          <ul class="tabs">
            <li><a href="#tab-description">Description</a></li>
            <!-- <li><a href="#tab-reviews">Reviews (0)</a></li> -->
          </ul>

          <div class="panel" id="tab-description">
            <p>{{$sanpham->description}}</p>
            </div>
          <div class="panel" id="tab-reviews">
            <p>No Reviews</p>
          </div>
        </div>
        <div class="space50">&nbsp;</div>
        <div class="beta-products-list">
          <h4>Sản phẩm tương tự</h4>

          <div class="row">
            @foreach($sp_tuongtu as $sptt)
            <div class="col-sm-4">
              <div class="single-item">
                @if($sptt->promotion_price!=0)
                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                @endif
                <div class="single-item-header">
                  <a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt=""></a>
                </div>
                <div class="single-item-body">
                  <p class="single-item-title">{{$sptt->name}}</p>
                  <p class="single-item-price">
                    @if($sptt->promotion_price != 0)
                    <span class="flash-del">{{number_format($sptt->unit_price)}} VNĐ</span>
                    <span class="flash-sale">{{number_format($sptt->promotion_price)}} VNĐ</span>
                    @else
                    <span>{{number_format($sptt->unit_price)}} VNĐ</span>
                    @endif
                  </p>
                </div>
                <div class="single-item-caption">
                  <a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
                  <a class="beta-btn primary">Details <i class="fa fa-chevron-right"></i></a>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row">{{$sp_tuongtu->links()}}</div>
        </div> <!-- .beta-products-list -->
      </div>
      <div class="col-sm-3 aside">
        <div class="widget">
          <div class="widget-body">
                <a class="pull-left"><img src="source/image/sale2.jpe" alt=""></a>
          </div>
        </div> <!-- best sellers widget -->
        <div class="row"></div>
        <div class="widget">
          <div class="widget-body">
                <a class="pull-left"><img src="source/image/sale1.png" alt=""></a>
          </div>
        </div> <!-- best sellers widget -->
      </div>
    </div>
  </div> <!-- #content -->
</div> <!-- .container -->
@endsection