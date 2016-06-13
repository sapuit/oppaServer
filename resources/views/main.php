<!DOCTYPE html>
<html lang="en" >

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online pharmacy | </title>

    <!-- Bootstrap core CSS -->

    <link href="<?= asset('public/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?= asset('public/fonts/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('public/css/animate.min.css') ?>" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?= asset('public/css/custom.css" rel="stylesheet') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('public/css/maps/jquery-jvectormap-2.0.1.css') ?>" />
    <link href="<?= asset('public/css/icheck/flat/green.css') ?>" rel="stylesheet" />
    <link href="<?= asset('public/css/floatexamples.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= asset('public/app/lib/angular/angular-toastr.min.css') ?>" rel="stylesheet">

    <script src="<?= asset('public/js/jquery.min.js') ?>"></script>
    <script src="<?= asset('public/js/nprogress.js') ?>"></script>
    <script src="<?= asset('/public/js/custom.js') ?>"></script>
    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    <script src="<?= asset('public/app/lib/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('public/app/lib/angular/angular-route.min.js') ?>"></script>
    <script src="<?= asset('public/app/lib/angular/angular-toastr.tpls.min.js') ?>"></script>
    <script src="<?= asset('public/app/lib/angular/angular-animate.min.js') ?>"></script>
    <script src="<?= asset('public/js/bootstrap.min.js') ?>"></script>

</head>


<body class="nav-md" ng-app="admin">

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
                            <img src="<?= asset('') ?>public/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,{{1 + 2}}</span>
                            <h2>pharmacist 1 </h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>Admin 1</h3>
                            <ul class="nav side-menu"  ng-controller="notification">
                                <li><a href=""><i class="fa fa-home"></i> Home <span class="fa fa-chevron-circle-right"></span></a>
                                </li>
                                <li ng-class="getClassRoot('/newpre', '/handlingpre')"><a><i class="fa fa-edit"></i> Đơn thuốc <span class="label label-success">{{notif.new + notifi.handling}} Mới</span><span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                    <li ng-class="getClass('/newpre')" ><a  href="#newpre">Đơn thuốc mới ({{notif.new}})</a>
                                        </li>
                                        <li ng-class="getClass('/handlingpre')" ><a href="#handlingpre">Chờ xử lý ({{notif.handling}})</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-calendar-o"></i>Giao dịch <span class="label label-success">{{notif.confirm + notif.ship + notif.complete}} Mới</span><span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li ng-class="getClass('/confirm')"><a href="#confirm">Chờ xát nhận ({{notif.confirm}})</a>
                                        </li>
                                        <li ng-class="getClass('/ship')"><a href="#ship">Đang giao nhận ({{notif.ship}})</a>
                                        </li>
                                        <li ng-class="getClass('/complete')"><a href="#">Hoàn thành ({{notif.complete}})</a>
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
                        <a href="<?= asset('logout') ?>" data-toggle="tooltip" data-placement="top" title="Logout">
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
                                <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="public/images/img.jpg" alt="">Admin 1
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
                                    <li><a href="<?= asset('logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
                                                <img src="<?= asset('') ?>public/images/img.jpg" alt="Profile Image" />
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
                                                <img src="<?= asset('') ?>public/images/img.jpg" alt="Profile Image" />
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
                                                <img src="<?= asset('') ?>public/images/img.jpg" alt="Profile Image" />
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
                                                <img src="<?= asset('') ?>public/images/img.jpg" alt="Profile Image" />
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
                                        <div class="text-center">
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
                <div ng-view></div>
                <!-- footer content -->
                <!-- <footer>

                    <div class="clearfix"></div>
                </footer> -->
                <!-- /footer content -->

            </div>
        </div>
        <!-- /page content -->
    </div>


</div>

<script type = "text/ng-template" id = "addStudent.htm">
    <h2> Add Student </h2>
    {{message}}
</script>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>


<!-- AngularJS Application Scripts -->
<script type="text/javascript" src="<?= asset('public/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('public/app/app.js') ?>"></script>
<script src="<?= asset('public/app/controllers/admincontroller.js') ?>"></script>
<script src="<?= asset('public/js/toastr.min.js') ?>"></script>

<script type = "text/ng-template" id = "addStudent.htm">
    <h2> Add Student </h2>
    {{message}}
</script>

<script type = "text/ng-template" id = "viewStudents.htm">
    <h2> View Students </h2>
    {{message}}
</script>

</body>
<script>
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
</html>