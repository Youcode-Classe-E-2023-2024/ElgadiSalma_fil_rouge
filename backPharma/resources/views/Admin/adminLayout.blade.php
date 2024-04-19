<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Niche Admin - Powerful Bootstrap 4 Dashboard and Admin Template</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

    <!-- v4.0.0-alpha.6 -->
    <link rel="stylesheet" href="assets-dashboard/bootstrap/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f9f9fa
        }

        .flex {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto
        }

        @media (max-width:991.98px) {
            .padding {
                padding: 1.5rem
            }
        }

        @media (max-width:767.98px) {
            .padding {
                padding: 1rem
            }
        }

        .padding {
            padding: 5rem
        }

        .card {
            box-shadow: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            -ms-box-shadow: none
        }

        .pl-3,
        .px-3 {
            padding-left: 1rem !important
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #d2d2dc;
            border-radius: 0
        }

        .card .card-title {
            color: #000000;
            margin-bottom: 0.625rem;
            text-transform: capitalize;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .card .card-description {
            margin-bottom: .875rem;
            font-weight: 400;
            color: #76838f;
        }

        p {
            font-size: 0.875rem;
            margin-bottom: .5rem;
            line-height: 1.5rem;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .table,
        .jsgrid .jsgrid-table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        .table thead th,
        .jsgrid .jsgrid-table thead th {
            border-top: 0;
            border-bottom-width: 1px;
            font-weight: 500;
            font-size: .875rem;
            text-transform: uppercase;
        }

        .table td,
        .jsgrid .jsgrid-table td {
            font-size: 0.875rem;
            padding: .875rem 0.9375rem;
        }

        .badge {
            border-radius: 0;
            font-size: 12px;
            line-height: 1;
            padding: .375rem .5625rem;
            font-weight: normal;
        }



        .SubmitAddMedicine {
            position: relative;
            margin: 1rem 10rem;
            padding: 10px 35%;
            outline: none;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            text-transform: uppercase;
            background-color: #fff;
            border: 1px solid rgba(61, 202, 181, 0.6);
            border-radius: 10px;
            color: #3aaf94;
            font-weight: 400;
            font-family: inherit;
            z-index: 0;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.02, 0.01, 0.47, 1);
        }

        .SubmitAddMedicine span {
            color: #0d6761;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.7px;
        }

        .SubmitAddMedicine:hover {
            animation: rotate624 0.7s ease-in-out both;
        }

        .SubmitAddMedicine:hover span {
            animation: storm1261 0.7s ease-in-out both;
            animation-delay: 0.06s;
        }

        @keyframes rotate624 {
            0% {
                transform: rotate(0deg) translate3d(0, 0, 0);
            }

            25% {
                transform: rotate(3deg) translate3d(0, 0, 0);
            }

            50% {
                transform: rotate(-3deg) translate3d(0, 0, 0);
            }

            75% {
                transform: rotate(1deg) translate3d(0, 0, 0);
            }

            100% {
                transform: rotate(0deg) translate3d(0, 0, 0);
            }
        }

        @keyframes storm1261 {
            0% {
                transform: translate3d(0, 0, 0) translateZ(0);
            }

            25% {
                transform: translate3d(4px, 0, 0) translateZ(0);
            }

            50% {
                transform: translate3d(-3px, 0, 0) translateZ(0);
            }

            75% {
                transform: translate3d(2px, 0, 0) translateZ(0);
            }

            100% {
                transform: translate3d(0, 0, 0) translateZ(0);
            }
        }

        .btn-shine {
            border: 1px solid;
            overflow: hidden;
            position: relative;
        }

        .btn-shine span {
            z-index: 20;
        }

        .btn-shine:after {
            background: #38ef7d;
            content: "";
            height: 155px;
            left: -75px;
            opacity: 0.4;
            position: absolute;
            top: -50px;
            transform: rotate(35deg);
            transition: all 550ms cubic-bezier(0.19, 1, 0.22, 1);
            width: 50px;
            z-index: -10;
        }

        .btn-shine:hover:after {
            left: 120%;
            transition: all 550ms cubic-bezier(0.19, 1, 0.22, 1);
        }
    </style>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets-dashboard/css/style.css">
    <link rel="stylesheet" href="assets-dashboard/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets-dashboard/css/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="assets-dashboard/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets-dashboard/plugins/hmenu/ace-responsive-menu.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper boxed-wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo blue-bg">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="assets-dashboard/img/logo-n.png" alt=""></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="assets-dashboard/img/logo.png" alt=""></span> </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar blue-bg navbar-static-top">
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
        <!-- Main Nav -->
        <div class="main-nav">
            <nav>
                <!-- Menu Toggle btn-->
                <div class="menu-toggle">
                    <h3>Menu</h3>
                    <button type="button" id="menu-btn"> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span> </button>
                </div>
                <!-- Responsive Menu Structure-->
                <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
                <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                    <li><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>

                    </li>

                    <li><a href="#"><i class="fa fa-edit"></i> <span>Forms</span></a>
                        <ul>
                            <li><a href="/addMedicine">Medicament</a></li>
                            <li><a href="/addUser">Utilisateur</a></li>
                            <li><a href="/addCategory">Category</a></li>
                        </ul>
                    </li>

                    <li> <a href="#"> <i class="fa fa-files-o"></i> <span>Sample Pages</span></a>
                        <ul>
                            <li><a href="pages-blank.html">Blank page</a></li>
                            <li><a href="#">Authentication</a>
                                <ul>
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
                </ul>
            </nav>
        </div>
        <!-- Main Nav -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header sty-one">
                <h1>Dashboard </h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><i class="fa fa-angle-right"></i> Dashboard </li>
                </ol>
            </div>





            @yield('adminContent')








            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">Version 1.2</div>
                Copyright © 2017 Yourdomian. All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="assets-dashboard/js/jquery.min.js"></script>

        <!-- v4.0.0-alpha.6 -->
        <script src="assets-dashboard/bootstrap/js/bootstrap.min.js"></script>

        <!-- template -->
        <script src="assets-dashboard/js/niche.js"></script>

        <!-- Morris JavaScript -->
        <script src="assets-dashboard/plugins/raphael/raphael-min.js"></script>
        <script src="assets-dashboard/plugins/morris/morris.js"></script>
        <script src="assets-dashboard/plugins/functions/dashboard1.js"></script>
        <script src="assets-dashboard/plugins/hmenu/ace-responsive-menu.js" type="text/javascript"></script>
        <!--Plugin Initialization-->
        <script type="text/javascript">
            $(document).ready(function() {
                $("#respMenu").aceResponsiveMenu({
                    resizeWidth: '768', // Set the same in Media query       
                    animationSpeed: 'fast', //slow, medium, fast
                    accoridonExpAll: false //Expands all the accordion menu on click
                });
            });
        </script>
</body>

</html>
