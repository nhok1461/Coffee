<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            </div>
          </form>
            </div>
<script type="text/javascript" src="source/assets/dest/js/noel.js"></script>
            <!-- /.navbar-header -->
            <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown no-arrow mx-1">
                      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <span class="badge badge-danger">9+</span>
                      </a>
                    </li>
                    <li></li>
                    <li class="nav-item dropdown no-arrow mx-1">
                      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <span class="badge badge-danger">7</span>
                      </a>
                    </li>
                  </ul>
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        @if(Auth::user())
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>{{Auth::user()->full_name}}</a>
                        </li>
                        <li><a href="ad/users/sua/{{Auth::user()->id}}"><i class="fa fa-gear fa-fw"></i> Thông tin </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="ad/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                        @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
          @include('ad.layout.menu')
        </nav>
        <link href="source/asset/dest/css//bootstrap.min.css" rel="stylesheet">

            <!-- Custom fonts for this template-->
            <link href="source/asset/dest/css/all.min.css" rel="stylesheet" type="text/css">

            <!-- Page level plugin CSS-->
            <link href="source/asset/dest/css/dataTables.bootstrap4.css" rel="stylesheet">

            <!-- Custom styles for this template-->
            <link href="source/asset/dest/css/sb-admin.css" rel="stylesheet">
