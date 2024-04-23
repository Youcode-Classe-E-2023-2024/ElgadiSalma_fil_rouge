<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Niche Admin - Powerful Bootstrap 4 Dashboard and Admin Template</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

    <!-- v4.0.0-alpha.6 -->
    <link rel="stylesheet" href="assets-dashboard-utilisateur/bootstrap/css/bootstrap.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets-dashboard-utilisateur/css/style.css">
    <link rel="stylesheet" href="assets-dashboard-utilisateur/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets-dashboard-utilisateur/css/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="assets-dashboard-utilisateur/css/themify-icons/themify-icons.css">

    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <style>
        .card {
            overflow: visible;
            width: 17rem;
            height: 20rem;
        }

        .cards {
            margin: 3rem;
            display: flex;
            flex-wrap: wrap;
            gap: 5rem;
            justify-content: center;
        }

        .content {
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 300ms;
            box-shadow: 0px 0px 10px 1px #000000ee;
            border-radius: 5px;
        }

        .front,
        .back {
            background-color: #151515;
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            border-radius: 5px;
            overflow: hidden;
        }

        .back {
            width: 100%;
            height: 100%;
            justify-content: center;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .back-content {
            position: absolute;
            width: 99%;
            height: 99%;
            background-color: #151515;
            border-radius: 5px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 30px;
        }

        .card:hover .content {
            transform: rotateY(180deg);
        }

        @keyframes rotation_481 {
            0% {
                transform: rotateZ(0deg);
            }

            0% {
                transform: rotateZ(360deg);
            }
        }

        .front {
            transform: rotateY(180deg);
            color: white;
        }

        .front .front-content {
            position: absolute;
            width: 100%;
            height: 100%;
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .front-content .badge {
            background-color: #00000055;
            padding: 2px 10px;
            border-radius: 10px;
            backdrop-filter: blur(2px);
            width: fit-content;
        }

        .description {
            box-shadow: 0px 0px 10px 5px #00000088;
            width: 100%;
            padding: 10px;
            background-color: #00000099;
            backdrop-filter: blur(5px);
            border-radius: 5px;
        }

        .title {
            font-size: 11px;
            max-width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .title p {
            width: 50%;
        }

        .card-footer {
            /* color: transparent; */
            margin-top: 5px;
            font-size: 8px;
        }

        .input {
            max-width: 190px;
            width: 40px;
            height: 40px;
            outline: none;
            margin: 5px;
            transition: .5s;
            border: none;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            transform: rotate(90deg);
        }

        input:focus {
            width: 150px;
            transform: rotate(0);
        }

        .front .img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .circle {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background-color: #ffbb66;
            position: relative;
            filter: blur(15px);
            animation: floating 2600ms infinite linear;
        }

        #bottom {
            background-color: #ff8866;
            left: 50px;
            top: 0px;
            width: 150px;
            height: 150px;
            animation-delay: -800ms;
        }

        #right {
            background-color: #ff2233;
            left: 160px;
            top: -80px;
            width: 30px;
            height: 30px;
            animation-delay: -1800ms;
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper boxed-wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo blue-bg">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="assets-dashboard-utilisateur/img/logo-n.png" alt=""></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="assets-dashboard-utilisateur/img/logo.png" alt=""></span> </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar blue-bg navbar-static-top">
                <!-- Sidebar toggle button-->
                <ul class="nav navbar-nav pull-left">
                    <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
                </ul>
                <div class="pull-left search-box">
                    <form action="#" method="get" class="search-form">
                        <div class="input-group">
                            <input name="search" class="form-control" placeholder="Search..." type="text">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                        class="fa fa-search"></i> </button>
                            </span>
                        </div>
                    </form>
                    <!-- search form -->
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle"
                                data-toggle="dropdown"> <img src="{{ asset('storage/images/users/' . $me->photo) }}"
                                    class="user-image" alt="User Image"> <span
                                    class="hidden-xs">{{ $me->name }}</span> </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <div class="pull-left user-img"><img
                                            src="{{ asset('storage/images/users/' . $me->photo) }}"
                                            class="img-responsive" alt="User"></div>
                                    <p class="text-left">{{ $role->name }} <small>{{ $me->email }}</small> </p>
                                    <div class="view-link text-left"><a href="#">View Profile</a> </div>
                                </li>
                                <li><a href=""><i class="fa fa-power-off"></i>
                                        <form action="{{ route('logout') }}" method="POST">@csrf<button
                                                type="submit">Logout</button></form>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="image text-center"><img src="assets-dashboard-utilisateur/img/img1.jpg"
                            class="img-circle" alt="User Image">
                    </div>
                    <div class="info">
                        <p>Alexander Pierce</p>
                        <a href="#"><i class="fa fa-cog"></i></a> <a href="#"><i
                                class="fa fa-envelope-o"></i></a> <a href="#"><i class="fa fa-power-off"></i></a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">PERSONAL</li>
                    <li class="active treeview"> <a href="#"> <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span> <span class="pull-right-container"> <i
                                    class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="/dashboardM">Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Apps</span> <span
                                class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="/approuvements">Approuvements</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-envelope-o "></i> <span>Inbox</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="apps-mailbox.html">Mailbox</a></li>
                            <li><a href="apps-mailbox-detail.html">Mailbox Detail</a></li>
                            <li><a href="apps-compose-mail.html">Compose Mail</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-briefcase"></i> <span>UI Elements</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/vente" class="active">Vente</a></li>
                            <li><a href="ui-user-card.html">User Cards</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-notification.html">Notification</a></li>
                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-range-slider.html">Range slider</a></li>
                            <li><a href="ui-timeline.html">Timeline</a></li>
                            <li><a href="ui-horizontal-timeline.html">Horizontal Timeline</a></li>
                            <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-bootstrap-switch.html">Bootstrap Switch</a></li>
                            <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
                            <li><a href="ui-list-media.html">List Media</a></li>
                            <li><a href="ui-carousel.html">Carousel</a></li>
                        </ul>
                    </li>
                    <li class="header">FORMS, TABLE & WIDGETS</li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-edit"></i> <span>Forms</span> <span
                                class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="form-elements.html">Form Elements</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-layouts.html">Form Layouts</a></li>
                            <li><a href="form-uploads.html">Form File Upload</a></li>

                            <li><a href="form-summernote.html">Summernote</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-table"></i> <span>Tables</span> <span
                                class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="table-basic.html">Basic Tables</a></li>
                            <li><a href="table-layout.html">Table Layouts</a></li>
                            <li><a href="table-data-table.html">Data Tables</a></li>
                            <li><a href="table-jsgrid.html">Js Grid Table</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-th"></i> <span>Widgets</span> <span
                                class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="widget-data.html">Data Widgets</a></li>
                            <li><a href="widget-apps.html">Apps Widgets</a></li>
                        </ul>
                    </li>
                    <li class="header">EXTRA COMPONENTS</li>
                    <li class="treeview"> <a href="#"><i class="fa fa-bar-chart"></i> <span>Charts</span> <span
                                class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="chart-morris.html">Morris Chart</a></li>
                            <li><a href="chart-chartist.html">Chartis Chart</a></li>

                            <li><a href="chart-knob.html">Knob Chart</a></li>
                            <li><a href="chart-chart-js.html">Chartjs</a></li>
                            <li><a href="chart-peity.html">Peity Chart</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-files-o"></i> <span>Sample Pages</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages-blank.html">Blank page</a></li>
                            <li class="treeview"><a href="#">Authentication <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i> </span> </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages-login.html">Login 1</a></li>
                                    <li><a href="pages-login-2.html">Login 2</a></li>
                                    <li><a href="pages-register.html">Register</a></li>
                                    <li><a href="pages-register2.html">Register 2</a></li>
                                    <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                                    <li><a href="pages-recover-password.html">Recover password</a></li>
                                </ul>
                            </li>
                            <li><a href="pages-profile.html">Profile page</a></li>
                            <li><a href="pages-invoice.html">Invoice</a></li>
                            <li><a href="pages-treeview.html">Treeview</a></li>
                            <li><a href="pages-pricing.html">Pricing</a></li>
                            <li><a href="pages-gallery.html">Gallery</a></li>
                            <li><a href="pages-faq.html">Faqs</a></li>
                            <li><a href="pages-404.html">404 Error Page</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-map-marker"></i> <span>Maps</span> <span
                                class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="map-google.html">Google Maps</a></li>
                            <li><a href="map-vector.html" class="active">Vector Maps</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-paint-brush"></i> <span>Icons</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                            <li><a href="icon-themify.html">Themify Icons</a></li>
                            <li><a href="icon-linea.html">Linea Icons</a></li>
                            <li><a href="icon-weather.html">Weather Icons</a></li>
                            <li><a href="icon-simple-lineicon.html">Simple Lineicons</a></li>
                            <li><a href="icon-flag.html">Flag Icons</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-share"></i> <span>Multilevel</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Level One</a></li>
                            <li class="treeview"> <a href="#">Level One <span class="pull-right-container"> <i
                                            class="fa fa-angle-left pull-right"></i> </span> </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"> Level Two</a></li>
                                    <li class="treeview"> <a href="#">Level Two <span
                                                class="pull-right-container"> <i
                                                    class="fa fa-angle-left pull-right"></i> </span> </a>
                                        <ul class="treeview-menu">
                                            <li><a href="#">Level Three</a></li>
                                            <li><a href="#">Level Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Level One</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header sty-one">
                <h1>Dashboard 4</h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><i class="fa fa-angle-right"></i> Dashboard 4</li>
                </ol>
            </div>
            <!-- /.content-wrapper -->


            @yield('moderateurContent')





            {{-- <footer class="main-footer">
                <div class="pull-right hidden-xs">Version 1.2</div>
                Copyright © 2017 Yourdomian. All rights reserved.
            </footer> --}}
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="assets-dashboard-utilisateur/js/jquery.min.js"></script>

        <!-- v4.0.0-alpha.6 -->
        <script src="assets-dashboard-utilisateur/bootstrap/js/bootstrap.min.js"></script>

        <!-- template -->
        <script src="assets-dashboard-utilisateur/js/niche.js"></script>

        <!-- Morris JavaScript -->
        <script src="assets-dashboard-utilisateur/plugins/raphael/raphael-min.js"></script>
        <script src="assets-dashboard-utilisateur/plugins/morris/morris.js"></script>
        <script src="assets-dashboard-utilisateur/plugins/functions/morris-init.js"></script>
</body>

</html>
