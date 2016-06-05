<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online pharmacy | </title>

    <!-- Bootstrap core CSS --> 

    <link href="{{url('')}}/public/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{url('')}}/public/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('')}}/public/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{url('')}}/public/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="{{url('')}}/public/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="{{url('')}}/public/css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="{{url('')}}/public/js/jquery.min.js"></script>
    <script src="{{url('')}}/public/js/nprogress.js"></script>
    <script>
        NProgress.start();
    </script>

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-medkit"></i> <span>Online Pharmacy</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{url('')}}/public/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>pharmacist 1</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>Admin 1</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{url('')}}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-circle-right"></span></a>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Đơn thuốc <span class="label label-success">{{$arrNum[0]+$arrNum[1]}} Mới</span><span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{{url('don-thuoc-moi')}}">Đơn thuốc mới ({{$arrNum[0]}})</a>
                                        </li>
                                        <li><a href="{{url('cho-xu-ly')}}">Chờ xử lý ({{$arrNum[1]}})</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-calendar-o"></i>Giao dịch <span class="label label-success">{{$arrNum[2]+$arrNum[3]+$arrNum[4]}} Mới</span><span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{{url('cho-xat-nhan')}}">Chờ xát nhận ({{$arrNum[2]}})</a>
                                        </li>
                                        <li><a href="{{url('giao-nhan')}}">Đang giao nhận ({{$arrNum[3]}})</a>
                                        </li>
                                        <li><a href="{{url('hoan-thanh')}}">Hoàn thành ({{$arrNum[4]}})</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Lịch sử <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="chartjs.html">Hôm nay (6)</a>
                                        </li>
                                        <li><a href="chartjs2.html">Tuần này (45)</a>
                                        </li>
                                        <li><a href="morisjs.html">Trong tháng</a>
                                        </li>
                                        <li><a href="echarts.html">Tất cả </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a href="login.html" data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{url('')}}/public/images/img.jpg" alt="">Admin 1
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;">  Profile</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>
                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{{url('')}}/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li ng-controller="employeesController">
                                        <div class="text-center" ng-repeat="employee in employees">
                                            <a>
                                                <strong><a href="inbox.html">See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">
                @yield('body_right')
            </div>
            <!-- /page content -->
        </div>


    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

        
     <script src="{{url('')}}/public/js/custom.js"></script>
    @yield('import_js')
</body>

</html>