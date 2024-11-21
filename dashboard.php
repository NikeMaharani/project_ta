<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    // Jika bukan admin atau belum login, redirect ke halaman lain (misal, halaman login)
    header("location:index.php");
    exit();
}

include 'layout/header.php'
    ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <h3><a class="nav-link menu-link collapsed" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="ri-home-4-fill"></i> <span data-key="t-dashboards">Halaman Utama</span>
                        </a></h3>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
</div>

<div class="main-content">
    <div class="container-fluid mh-auto">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3" style="max-width: 17rem;">
                    <div class="card-body">
                        <h5 class="card-title">Data Produk</h5>
                        <a href="product.php">
                            <button type="button" class="btn btn-subtle-primary w-100">Kelola</button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3" style="max-width: 17rem;">
                    <div class="card-body">
                        <h5 class="card-title">Data Order</h5>
                        <a href="data_order.php">
                            <button type="button" class="btn btn-subtle-warning w-100">Kelola</button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3" style="max-width: 17rem;">
                    <div class="card-body">
                        <h5 class="card-title">Data User</h5>
                        <a href="data_user.php">
                            <button type="button" class="btn btn-subtle-info w-100">Kelola</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php'
    ?>