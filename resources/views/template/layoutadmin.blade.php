<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Electronics-Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("css/stylefooter.css")}}">
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.min.css")}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <div class="loader">Loading ...</div>
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{asset("img/e.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">-Electronics</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset("dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <p class="d-block">{{ Auth::user()->name }}</p>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2 mb-5">
                    <ul class=" nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}"
                                class="nav-link {{ request()->is("dashboard") ? "active font-weight-bold" : "" }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->is("product") || request()->is("add-product")  || request()->is("show") || request()->is("preview")  ? "active" : "" }}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Product
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('product')}}"
                                        class="nav-link {{ request()->is("product") ? "active" : "" }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('addproduct')}}"
                                        class="nav-link {{ request()->is("add-product") ? "active" : "" }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('addcategory')}}"
                                class="nav-link {{ request()->is("add-category") ? "active" : "" }}">
                                <i class="nav-icon fas fa-suitcase"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is("user/list") ? "active" : "" }}">
                                <i class=" nav-icon fas fa-user-circle"></i>
                                <p>
                                    Account
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route("users")}}"
                                        class="nav-link {{ request()->is("user/list") ? "active" : "" }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            User
                                        </p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route("admins")}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Admin
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('outordered')}}"
                                class="nav-link {{ request()->is("out/ordered") || request()->is("out/confirmed")  || request()->is("out/packing") || request()->is("out/sent")  ? "active" : "" }}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Transaction
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('history')}}"
                                class="nav-link {{ request()->is("history") ? "active" : "" }}">
                                <i class="nav-icon fas fa-book-medical"></i>
                                <p>
                                    History & Report
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 E-Electronics.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("dist/js/adminlte.js")}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset("plugins/select2/js/select2.full.min.js")}}"></script>
    <script src="{{asset("plugins/jquery-mousewheel/jquery.mousewheel.js")}}"></script>
    <script src="{{asset("plugins/raphael/raphael.min.js")}}"></script>
    <script src="{{asset("plugins/jquery-mapael/jquery.mapael.min.js")}}"></script>
    <script src="{{asset("plugins/jquery-mapael/maps/usa_states.min.js")}}"></script>
    <!-- ChartJS -->
    <script src="{{asset("plugins/chart.js/Chart.min.js")}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset("dist/js/demo.js")}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset("dist/js/pages/dashboard2.js")}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration : 2500
        });
    </script>
    @stack('js')
</body>

</html>