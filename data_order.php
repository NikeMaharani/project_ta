<?php
session_start();
include 'layout/header.php';
include 'koneksi.php';
?>

<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Data Order</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Data Order</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <!-- Search Form -->
            <div class="row mb-3">
                <div class="col-12">
                    <form class="d-flex" action="data_order.php" method="get">
                        <input type="text" class="form-control" name="search" placeholder="Search by Username or Product" aria-label="Search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="btn btn-primary ms-2" type="submit">Search</button>
                        <?php if (isset($_GET['search']) && $_GET['search'] != ''): ?>
                            <a href="data_order.php" class="btn btn-secondary ms-2">Cancel</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <!-- End Search Form -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Orders</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered align-middle table-nowrap mb-0">
                                    <thead class="table-active">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="option" id="checkAll">
                                                </div>
                                            </th>
                                            <th>Username</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Total Amount</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <?php
                                        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                                        // Query to fetch orders based on the search term, excluding 'terkirim' orders and ordered by the latest
                                        $query = "
                                            SELECT 
                                                o.order_date as tgl, 
                                                u.username as nama, 
                                                o.id_order as id_order,
                                                o.status as status
                                            FROM orders as o 
                                            JOIN multi_user as u ON u.id_multi = o.id_multi
                                            WHERE (u.username LIKE '%$searchTerm%' 
                                                   OR o.id_order LIKE '%$searchTerm%')
                                              AND o.status != 'terkirim'  -- Exclude orders with status 'terkirim'
                                            ORDER BY o.order_date DESC  -- Order by latest order date
                                        ";

                                        $data = mysqli_query($koneksi, $query);

                                        if (!$data) {
                                            die("Query Failed: " . mysqli_error($koneksi));
                                        }

                                        if (mysqli_num_rows($data) > 0) {
                                            $no = 1;
                                            while ($row = mysqli_fetch_array($data)) {
                                                $orderId = $row['id_order'];
                                                $items = mysqli_query($koneksi, "
                                                    SELECT 
                                                        p.product_name as product, 
                                                        oi.quantity as jumlah, 
                                                        (oi.quantity * p.price) as subtotal 
                                                    FROM order_item as oi 
                                                    JOIN products as p ON oi.id_product = p.id_product 
                                                    WHERE oi.id_order = '$orderId'
                                                ");

                                                if (!$items) {
                                                    die("Items Query Failed: " . mysqli_error($koneksi));
                                                }

                                                while ($item = mysqli_fetch_array($items)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= htmlspecialchars($row['nama']); ?></td>
                                                        <td><?= htmlspecialchars($item['product']); ?></td>
                                                        <td><?= htmlspecialchars($item['jumlah']); ?></td>
                                                        <td>Rp. <?= number_format($item['subtotal'], 0, ',', '.'); ?></td>
                                                        <td><?= date('d-m-Y', strtotime($row['tgl'])); ?></td>
                                                        <td>
                                                            <?= (isset($_SESSION['sent_orders']) && in_array($row['id_order'], $_SESSION['sent_orders'])) ? 'Terkirim' : 'Pesan'; ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($_SESSION['sent_orders']) && in_array($row['id_order'], $_SESSION['sent_orders'])): ?>
                                                                <button type="button" class="btn btn-info" title="Order Sent" disabled>
                                                                    <i class="ph-check align-middle me-1"></i>
                                                                </button>
                                                            <?php else: ?>
                                                                <a href="update_order_status.php?id_order=<?= $row['id_order'] ?>&status=terkirim" onclick="return confirm('Apakah Pesanan Akan di Kirim?');">
                                                                    <button type="button" class="btn btn-success" title="Kirimkan Pesanan">
                                                                        <i class="ph-airplane align-middle me-1"></i>
                                                                    </button>
                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $no++;
                                            }
                                        } else {
                                            echo '<tr><td colspan="8" class="text-center">No orders found for the search criteria.</td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!-- end table-responsive -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?php
include 'layout/footer.php';
?>
