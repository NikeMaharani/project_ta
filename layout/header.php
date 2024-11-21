<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">



<!-- Mirrored from themesbrand.com/steex/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2024 21:34:18 GMT -->

<head>

    <meta charset="utf-8">
    <title> MaharaniShop Admin</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <!-- <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo pitih.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="22">
            </span>
        </a>
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo pitih.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="22">
            </span>
        </a>
            </div> -->
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
                            <a class="nav-link menu-link" href="dashboard.php" role="button" aria-expanded="false">
                                <i class="ph-gauge"></i>
                                <span data-key="t-dashboards">Dashboards</span>
                            </a>

                            <a class="nav-link menu-link" href="product.php" role="button" aria-expanded="false">
                                <i class="fas fa-box"></i>
                                <span data-key="t-products">Data Produk</span>
                            </a>

                            <a class="nav-link menu-link" href="data_order.php" role="button" aria-expanded="false">
                                <i class="ph-shopping-cart"></i>
                                <span data-key="t-orders">Data Order</span>
                            </a>

                            <a class="nav-link menu-link" href="data_user.php" role="button" aria-expanded="false">
                                <i class="ph-users"></i>
                                <span data-key="t-users">Data User</span>
                            </a>

                            <a href="javascript:void(0);" onclick="confirmLogout()" class="nav-link menu-link">
                                <i class="ph-sign-out"></i>
                                <span>Logout</span>
                            </a>

                            <script>
                                function confirmLogout() {
                                    // Show confirmation dialog
                                    if (confirm("Anda Yakin ingin Logout?")) {
                                        window.location.href = "logout.php";
                                    }
                                }
                            </script>


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
                <div class="navbar-header d-flex justify-content-between align-items-center">
                
                    <form class="app-search d-none d-md-inline-flex" onsubmit="return performSearch(search.php)">
                        <!-- <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                id="search-options" name="query">
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                        </div> -->
                    </form>


                    <!-- Right side of header (Fullscreen, Dark/Light Mode, Profile) -->
                    <div class="d-flex align-items-center">
                        <!-- Fullscreen Button -->
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            data-toggle="fullscreen">
                            <i class='bi bi-arrows-fullscreen fs-lg'></i>
                        </button>

                        <!-- Light/Dark Mode Dropdown -->
                        <div class="dropdown topbar-head-dropdown ms-1 header-item">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-sun align-middle fs-3xl"></i>
                            </button>
                            <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                                <a href="#!" class="dropdown-item" data-mode="light"><i
                                        class="bi bi-sun align-middle me-2"></i> Default (light mode)</a>
                                <a href="#!" class="dropdown-item" data-mode="dark"><i
                                        class="bi bi-moon align-middle me-2"></i> Dark</a>
                                <a href="#!" class="dropdown-item" data-mode="auto"><i
                                        class="bi bi-moon-stars align-middle me-2"></i> Auto (system
                                    default)</a>
                            </div>
                        </div>

                        
                        <div class="dropdown ms-3 topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="assets/images/image.png"
                                        alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Nike
                                            Putri</span>
                                        <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text">MaharaniShop
                                            Admin</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome Admin!</h6>
                                <a class="dropdown-item" href=""><i
                                        class="mdi mdi-account-circle text-muted fs-lg align-middle me-1"></i>
                                    <span class="align-middle">Profile</span></a>

                                <a class="dropdown-item" href="logout.php"><i
                                        class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body p-md-5">
                        <div class="text-center">
                            <div class="text-danger">
                                <i class="bi bi-trash display-4"></i>
                            </div>
                            <div class="mt-4 fs-base">
                                <h4 class="mb-1">Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- removeCartModal -->
        <div id="removeCartModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-cartmodal"></button>
                    </div>
                    <div class="modal-body p-md-5">
                        <div class="text-center">
                            <div class="text-danger">
                                <i class="bi bi-trash display-5"></i>
                            </div>
                            <div class="mt-4">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this product ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="remove-cartproduct">Yes, Delete
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->