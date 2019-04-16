<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="source/assets/dest/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="source/assets/dest/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="source/assets/dest/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="source/assets/dest/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="source/assets/dest/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="source/assets/dest/css/dataTables.responsive.css" rel="stylesheet">
    <style type="text/css">
    th{
    border-top:1px solid gray;
    border-bottom: 1px solid gray;
    padding:1px;
    text-align: center;
    }
    table{
      background-color: #99FFFF;
    }
    </style>
</head>

<body >

    <div id="wrapper" >

        @include('ad.layout.header')

        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="source/assets/dest/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="source/assets/dest/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="source/assets/dest/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="source/assets/dest/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="source/assets/dest/js/dataTables.bootstrap4.min.js"></script>
    <script src="source/assets/dest/js/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script type="text/javascript" language="javascript" src="admim_asset/ckeditor/ckeditor.js" ></script>
    @yield('script')
</body>

</html>
