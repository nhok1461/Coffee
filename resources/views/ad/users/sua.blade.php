@extends('ad.layout.index')
@section('content')
     <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User :
                            <small>{{$users->full_name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                       @if(count($errors)>0)
                       <div class="alert alert-danger">
                          @foreach($errors->all() as $err)
                          {{$err}}<br>
                          @endforeach
                      </div>
                      @endif
                      @if(session('thongbao'))
                      <div class="alert alert-success">
                          {{session('thongbao')}}
                      </div>
                      @endif
                      <form action="ad/users/sua/{{$users->id}}" method="POST">
                              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">

                                <label>Họ Tên</label>
                                <input class="form-control" name="full_name" placeholder="Please Enter Category Name" value="{{$users->full_name}}" />
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control"  name="email" placeholder="Please Enter Category Order" value="{{$users->email}}"readonly=" " />
                            </div>

                             <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input class="form-control password" type="password" name="passwordAgain" value="{{$users->password}}" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address"  value="{{$users->address}}" />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone"  value="{{$users->phone}}" />
                            </div>
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0"
                                    @if($users->quyen == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1"
                                    <input name="quyen" value="0"
                                    @if($users->quyen == 1)
                                    {{"checked"}}
                                    @endif
                                    type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
