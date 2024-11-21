<?php
// Menyertakan file koneksi database dan header
include 'koneksi.php';
include 'layout/header2.php';

// Ambil ID produk dari URL
$id_product = isset($_GET['id_product']) ? $_GET['id_product'] : 0;

// Query untuk mendapatkan detail produk dari database
$sql = "SELECT * FROM products WHERE id_product = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id_product);
$stmt->execute();
$result = $stmt->get_result();
$detail = $result->fetch_assoc();

// Jika produk tidak ditemukan, tampilkan pesan
if (!$detail) {
    echo "<h2>Product not found</h2>";
    exit;
}
?>

<style>
    /* Perkecil ukuran gambar produk */
    .product-image {
        max-width: 100%;
        height: auto;
        width: 150px; /* Sesuaikan ukuran gambar */
        object-fit: cover;
        margin-bottom: 20px;
    }

    .card-detail {
        padding: 20px;
    }

    /* Buat konten lebih responsif dan rapi */
    .card-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .card-content h2 {
        font-size: 24px;
        font-weight: bold;
    }

    .card-content p {
        font-size: 16px;
        margin-top: 10px;
    }

    .card-content strong {
        font-size: 16px;
        color: #333;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        margin-top: 15px;
    }

    @media (min-width: 768px) {
        .row {
            display: flex;
            justify-content: space-between;
        }

        .col-md-6 {
            width: 48%;
        }

        /* Offset to center content with margin 4-3 from navbar/sidebar */
        .offset-md-3 {
            margin-left: 25%;
        }

        .offset-md-3 {
            margin-top: 25%;
        }
    }

    @media (max-width: 767px) {
        .col-md-6 {
            width: 100%;
        }

        .card-content h2 {
            font-size: 22px;
        }

        .card-content p {
            font-size: 14px;
        }
    }
</style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid mh-auto"></div>
            <div class="card mb-3 card-detail mt-2"> <!-- Offset untuk jarak dari sidebar dan margin-top untuk jarak dari header -->
                <section class="content py-5">
                    <div class="container">
                        <div class="row">
                            <!-- Kolom untuk gambar produk -->
                            <div class="col-md-6">
                                <img src="uploads/<?php echo htmlspecialchars($detail['picture']); ?>" 
                                    alt="<?php echo htmlspecialchars($detail['product_name']); ?>" 
                                    class="product-image">
                            </div>

                            <!-- Kolom untuk detail produk -->
                            <div class="col-md-6">
                                <div class="card-content">
                                <input type="hidden" name="id_produk[]" value="<?= $id; ?>">
                                                                <input type="hidden" name="produk[]" value="<?= htmlspecialchars($product['name']);?>">
                                                                <input type="hidden" name="jumlah[]" value="<?= htmlspecialchars($product['quantity']);?>">
                                    <h2><?php echo htmlspecialchars($detail['product_name']); ?></h2>
                                    <p><?php echo htmlspecialchars($detail['description']); ?></p>
                                    <p><strong>Stock:</strong> <?php echo htmlspecialchars($detail['stock']); ?></p>
                                    <p><strong>Price:</strong> Rp <?php echo number_format($detail['price'], 2, ',', '.'); ?></p>

                                    <!-- Tombol aksi untuk pembelian -->
                                    <a href="add_to_cart.php?id=<?php echo $detail['id_product']; ?>" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php
// Menyertakan file footer
include 'layout/footer.php';
?>
