<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-topbar="light" data-bs-theme="light">


    
<!-- Mirrored from themesbrand.com/steex/layouts/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2024 21:36:07 GMT -->
<head>

        <meta charset="utf-8">
        <title>Sign In </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Minimal Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Fonts css load -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link id="fontsLink" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

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


        <section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="card mb-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-xxl-5">
                                    <div class="card auth-card bg-secondary h-100 border-0 shadow-none d-none d-sm-block mb-0">
                                        
                                <!--end col-->
                                <div class="col-xxl-6 mx-auto">
                                    <div class="card mb-0 border-0 shadow-none mb-0">
                                        <div class="card-body p-sm-5 m-lg-4">
                                            <div class="text-center mt-5">
                                                <h5 class="fs-3xl">Welcome Back</h5>
                                                <p class="text-muted">Login ke MaharaniShop</p>
                                            </div>
                                            <div class="p-2 mt-5">
                                                <form action="cek_login.php" method="post">
                            
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Email <span class="text-danger">*</span></label>
                                                        <div class="position-relative ">
                                                            <input type="email" class="form-control  password-input" id="username" name="email" placeholder="Masukkan email" required>
                                                        </div>
                                                    </div>
                            
                                                    <div class="mb-3">
                                                       
                                                        <label class="form-label" for="password-input">Password <span class="text-danger">*</span></label>
                                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                                            <input type="password" class="form-control pe-5 password-input " name="password" placeholder="Masukkan password" id="password-input" required>
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        </div>
                                                    </div>
                            
                            
                            
                                                    <div class="mt-4">
                                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                                    </div>
                            
                                                   
                                                </form>
                            
                                                <div class="text-center mt-5">
                                                    <p class="mb-0">Belum Mempunyai Akun ? <a href="register.php" class="fw-semibold text-secondary text-decoration-underline"> Register</a> </p>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        
        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        

        
        <script src="assets/js/pages/password-addon.init.js"></script>
        
        <!--Swiper slider js-->
        <script src="assets/libs/swiper/swiper-bundle.min.js"></script>
        
        <!-- swiper.init js -->
        <script src="assets/js/pages/swiper.init.js"></script>

    </body>


<!-- Mirrored from themesbrand.com/steex/layouts/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2024 21:36:08 GMT -->
</html>