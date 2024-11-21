<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">



<!-- Mirrored from themesbrand.com/steex/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2024 21:34:18 GMT -->

<head>

    <meta charset="utf-8">
    <title>Dashboard MaharaniShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Fonts css load -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link id="fontsLink"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- jsvectormap css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css">

    <!--Swiper slider css-->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="22">
            </span>
        </a>
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="22">
            </span>
        </a> -->
            </div>
            <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">

                        <li class="menu-title text-center">
                            <span data-key="t-menu"
                                style="font-size: 2em; font-weight: bold; margin-top: 10px; display: block; margin-bottom: 20px;">Menu</span>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="home.php" role="button" aria-expanded="false">
                                <i class="ph-gauge"></i>
                                <span data-key="t-dashboards">Dashboards</span>
                            </a>

                            <a class="nav-link menu-link" href="keranjang.php" role="button" aria-expanded="false">
                                <i class="ph-shopping-cart"></i>
                                <span data-key="t-products">Keranjang</span>
                            </a>

                            <a class="nav-link menu-link" href="riwayat.php" role="button" aria-expanded="false">
                                <i class="ph-file-text"></i>
                                <span data-key="t-products">Riwayat Pesanan</span>
                            </a>

                            <a href="javascript:void(0);" onclick="confirmLogout()" class="nav-link menu-link">
                                <i class="ph-sign-out"></i>
                                <span>Logout</span>
                            </a>

                            <script>
                                function confirmLogout() {
                                    // Show confirmation dialog
                                    if (confirm("Anda Yakin ingin Logout?")) {
                                        // If the user confirms, redirect to logout.php
                                        window.location.href = "logout.php";
                                    }
                                    // If the user cancels, no action is taken
                                }
                            </script>

                        </li>
                        </li>


                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex align-items-center">
                        <!-- Logo -->
                        <!-- <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                                <img src="assets/images/logo-dark.png" alt="" height="22">
                            </a>
                            <a href="index.html" class="logo logo-light">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                                <img src="assets/images/logo-light.png" alt="" height="22">
                            </a>
                        </div> -->

                        <!-- Hamburger Icon for Mobile -->
                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- Search Bar -->
                        <form class="app-search d-none d-md-inline-flex ms-3">
                            <!-- <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                            </div> -->
                        </form>
                    </div>

                    <div class="d-flex align-items-center">
                        <!-- Fullscreen Button -->
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle ms-3" data-toggle="fullscreen">
                            <i class="bi bi-arrows-fullscreen fs-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->