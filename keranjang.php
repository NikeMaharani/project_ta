<?php
session_start(); 
include 'koneksi.php'; // Pastikan file koneksi database sudah disertakan
include 'layout/header2.php';

// Cek jika produk dihapus dari keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]); 
    }
    echo "<script>alert('Produk Dihapus dari Keranjang.');</script>";
}

// Proses update kuantitas produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$update_id])) {
        // Ambil stok dari database untuk validasi
        $sql = "SELECT stock FROM products WHERE id_product = ?";
        $stmt = $koneksi->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $update_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $product_data = $result->fetch_assoc();

            if ($action == 'increase') {
                // Cek apakah kuantitas yang diinginkan melebihi stok
                if ($_SESSION['cart'][$update_id]['quantity'] < $product_data['stock']) {
                    $_SESSION['cart'][$update_id]['quantity']++; // Tambah kuantitas
                } else {
                    echo "<script>alert('Stok tidak tersedia atau terbatas.');</script>";
                }
            } elseif ($action == 'decrease') {
                if ($_SESSION['cart'][$update_id]['quantity'] > 1) {
                    $_SESSION['cart'][$update_id]['quantity']--; // Kurangi kuantitas
                } else {
                    unset($_SESSION['cart'][$update_id]); // Hapus produk jika kuantitas 0
                }
            }
        } else {
            echo "Error: " . $koneksi->error; // Debug jika query gagal
        }
    }
}
?>



<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xxl-10">
                    <div class="card">
                        <div class="row g-0 product-list">
                            <div class="col-xxl-9">
                                <div class="card-header d-flex align-items-center gap-2">
                                    <h5 class="card-title flex-grow-1 mb-0">Shopping Cart</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-borderless mb-0">
                                            <thead class="table-active">
                                                <tr>
                                                    <th>Product Items</th>
                                                    <th>Item Price</th>
                                                    <th>Quantity</th>
                                                    <th class="text-end">Total Amount</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                                    foreach ($_SESSION['cart'] as $id => $product) {
                                                        $subtotal = $product['price'] * $product['quantity'];
                                                        $total += $subtotal;
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <img src="uploads/<?= htmlspecialchars($product['image']); ?>"
                                                                    alt="<?= htmlspecialchars($product['name']); ?>"
                                                                    style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                                                <?= htmlspecialchars($product['name']); ?>
                                                            </td>
                                                            <td>Rp.<?= number_format($product['price'], 2); ?></td>
                                                            <td>
                                                                <form action="keranjang.php" method="post"
                                                                    style="display:inline;">
                                                                    <input type="hidden" name="update_id" value="<?= $id; ?>">
                                                                    <button type="submit" name="action" value="decrease"
                                                                        class="btn btn-secondary btn-sm"
                                                                        <?= ($product['quantity'] <= 1) ? 'disabled' : ''; ?>>-</button>
                                                                    <input type="text" name="quantity"
                                                                        value="<?= htmlspecialchars($product['quantity']); ?>"
                                                                        style="width: 50px; text-align: center;" readonly />
                                                                    <button type="submit" name="action" value="increase"
                                                                        class="btn btn-secondary btn-sm">+</button>
                                                                </form>
                                                            </td>
                                                            <td class="text-end">Rp.<?= number_format($subtotal, 2); ?></td>
                                                            <td class="text-end">
                                                                <form action="keranjang.php" method="post"
                                                                    style="display:inline;">
                                                                    <input type="hidden" name="remove_id" value="<?= $id; ?>">
                                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Anda Yakin Akan Menghapus Produk ini dari Keranjang?')">Remove</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo '<tr><td colspan="5">Your cart is empty!</td></tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3">
                                <div class="border-start-xxl border-top-xxl-0 border-top h-100">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Order Summary</h5>
                                    </div>
                                    <div class="card-body mt-2">
                                        <div class="table-responsive table-card">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-end fw-bold">Total :</td>
                                                        <td class="text-end">
                                                            <span
                                                                class="fw-semibold">Rp.<?= number_format($total, 2); ?></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="text-end mt-4 d-flex flex-wrap gap-1 justify-content-end">
                                            <a href="home.php" class="btn btn-secondary">Continue Shopping</a>
                                            <a href="chekout.php" class="btn btn-primary">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>