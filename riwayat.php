<?php
session_start();
include 'layout/header2.php';
include 'koneksi.php';

$email = $_SESSION['email'];

$query_user = mysqli_query($koneksi, "SELECT id_multi FROM multi_user WHERE email='$email'");
if (mysqli_num_rows($query_user) > 0) {
    $row_user = mysqli_fetch_assoc($query_user);
    $id_user = $row_user['id_multi'];
} else {
    echo "User not found!";
    exit();
}

// Handle search functionality
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
?>

<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h5>Riwayat Pesanan</h5>
            
            <!-- Search Bar with Cancel Button -->
            <div class="row mb-3">
                <div class="col-12">
                    <form class="d-flex" action="riwayat.php" method="get">
                        <input type="text" class="form-control" name="search" placeholder="Search by product or status" value="<?= htmlspecialchars($searchTerm) ?>">
                        <button class="btn btn-primary ms-2" type="submit">Search</button>
                        <?php if (!empty($searchTerm)): ?>
                            <a href="riwayat.php" class="btn btn-secondary ms-2">Cancel</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

            <div class="row">
                <?php
                // Query to retrieve orders based on user ID, filter by search term, and sort by date
                $query_order = mysqli_query($koneksi, "
                    SELECT o.id_order, o.order_date, o.status 
                    FROM orders as o 
                    WHERE o.id_multi = $id_user 
                    AND (o.status LIKE '%$searchTerm%' 
                        OR EXISTS (
                            SELECT 1
                            FROM order_item as oi
                            JOIN products as p ON oi.id_product = p.id_product
                            WHERE oi.id_order = o.id_order 
                            AND p.product_name LIKE '%$searchTerm%'
                        )
                    )
                    ORDER BY o.order_date DESC
                ");

                // Check if any orders are found
                if (mysqli_num_rows($query_order) > 0) {
                    while ($row = mysqli_fetch_assoc($query_order)) {
                        $orderId = $row['id_order'];

                        // Retrieve items for each order
                        $items = mysqli_query($koneksi, "
                            SELECT 
                                p.product_name as produk, 
                                oi.quantity as jumlah, 
                                (oi.quantity * p.price) as subtotal 
                            FROM order_item as oi 
                            JOIN products as p ON oi.id_product = p.id_product 
                            WHERE oi.id_order = '$orderId'
                        ");

                        $productList = [];
                        $totalPrice = 0;

                        // Collect product item data and calculate total price
                        while ($item = mysqli_fetch_array($items)) {
                            $productList[] = $item;
                            $totalPrice += $item['subtotal'];
                        }
                ?>
                        <!-- Display each order in a card format -->
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <h4>Detail Pesanan</h4>
                                            <hr>
                                            Tanggal Order : <?= date('d M Y', strtotime($row['order_date'])) ?>
                                            <hr>
                                            <ul class="list-group">
                                                <?php foreach ($productList as $product) { ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <?= htmlspecialchars($product['produk']) . " (" . htmlspecialchars($product['jumlah']) . ")" ?>
                                                        <span>Rp.<?= number_format($product['subtotal'], 0, ',', '.') ?></span>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <span>Total :</span>
                                                <span>Rp.<?= number_format($totalPrice, 0, ',', '.') ?></span>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <strong>Status Pesanan :</strong>
                                                <strong><?= htmlspecialchars($row['status']) ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    } // End while loop
                } else {
                    // Display a message if no orders are found
                    echo "<p class='text-center mt-4'>Belum ada riwayat pesanan atau tidak ada hasil pencarian.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page-content -->

<?php
include 'layout/footer.php';
?>
