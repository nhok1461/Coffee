<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
     <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="source/image/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/util.css">
    <link rel="stylesheet" type="text/css" href="source/assets/dest/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form"  action="ad/dangnhap" method="POST">
                     <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <span >
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

                        @if(session('thongbao'))
                         <div class="alert alert-danger">

                            {{session('thongbao')}}
                        </div>
                        @endif
                    </span>
                    <p></p><br><br>
                    <div class="wrap-input100 validate-input" data-validate = "Vui Lòng nhập mail">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Vui lòng nhập password">
                        <span class="btn-show-pass">
                           {{--  <i class="zmdi zmdi-eye"></i> --}}
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

</body>
</html>

<!--===============================================================================================-->
    <script src="source/assets/dest/js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="source/assets/dest/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="source/assets/dest/js/popper.js"></script>
    <script src="source/assets/dest/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="source/assets/dest/js/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="source/assets/dest/js/moment.min.js"></script>
    <script src="source/assets/dest/js/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="source/assets/dest/js/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="source/assets/dest/js/main.js"></script>
