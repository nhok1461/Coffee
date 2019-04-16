@extends('master')
@section('content')
<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title">Cà phê {{$lsp->name}}</h6>
    </div>
    <div class="pull-right">
      <div class="beta-breadcrumb font-large">
        <span>Home</span> / <span>Sản phẩm</span>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
        <div class="col-sm-3">
          <ul class="aside-menu">
            @foreach($loai as $l)
            <li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="col-md-7">
          <div class="beta-products-list">
            <h4>Sản Phẩm</h4>
            <div class="beta-products-details">
              <p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="row">
              @foreach($sp_theoloai as $spt)
              <div class="col-sm-4">
                <div class="single-item">
                  @if($spt->promotion_price!=0)
                  <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                  @endif
                  <div class="single-item-header">
                    <a href="{{route('chitietsanpham',$spt->id)}}"><img src="source/image/product/{{$spt->image}}" alt="" height="250px"></a>
                  </div>
                  <div class="single-item-body">
                    <p class="single-item-title">{{$spt->name}}</p>
                    <p class="single-item-price">
                      @if($spt->promotion_price != 0)
                      <span class="flash-del">{{number_format($spt->unit_price)}} VNĐ</span>
                      <span class="flash-sale">{{number_format($spt->promotion_price)}} VNĐ</span>
                      @else
                      <span>{{number_format($spt->unit_price)}} VNĐ</span>
                      @endif
                    </p>
                  </div>
                  <div class="single-item-caption">
                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$spt->id)}}"><i class="fa fa-shopping-cart"></i></a>
                    <a class="beta-btn primary">Chi tiết <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            </div>
          </div> <!-- .beta-products-list -->

          <div class="space50">&nbsp;</div>
        </div>
        <div class="col-sm-3">
          <div class="widget">
            <div class="widget-body">
                  <a class="pull-left"><img src="source/image/sale2.jpe" alt=""></a>
            </div>
          </div>
        </div>
      </div> <!-- end section with sidebar and main content -->
    </div> <!-- .main-content -->
  </div> <!-- #content -->
</div> <!-- .container -->
@endsection
