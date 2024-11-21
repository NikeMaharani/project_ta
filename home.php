<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'user') {
    // Redirect if not logged in as user
    header("location:index.php");
    exit();
}
include 'layout/header2.php';
include 'koneksi.php';
?>

<style>
    .fixed-card {
        width: 100%;
        height: 420px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .new-arrivals-img-contnent {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 150px;
    }

    .fixed-card img {
        max-height: 100%;
        width: auto;
        object-fit: cover;
    }

    .new-arrival-content {
        text-align: left;
    }

    .new-arrival-content h4 {
        font-size: 18px;
        font-weight: bold;
    }

    .price {
        font-weight: bold;
        color: #000;
        margin-top: 5px;
    }

    .stock {
        font-size: 14px;
        color: #28a745;
        margin-top: 5px;
    }

    .buttons {
        display: flex;
        justify-content: flex-start;
        gap: 10px;
        margin-top: 10px;
    }

    .buttons a {
        padding: 10px 10px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
    }

    .buttons a.add-to-cart {
        background-color: #add8e6;
    }

    .buttons a.detail {
        background-color: #aed9ea;
        color: white;
    }

    .buttons a:hover {
        opacity: 0.8;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid mh-auto">
            <!-- Start Search Bar with Cancel Button -->
            <div class="row mb-3">
                <div class="col-12">
                    <form class="d-flex" action="home.php" method="get">
                        <input type="text" class="form-control" name="search" placeholder="Search products..."
                            aria-label="Search"
                            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="btn btn-primary ms-2" type="submit">Search</button>
                        <?php if (isset($_GET['search']) && $_GET['search'] != ''): ?>
                            <a href="home.php" class="btn btn-secondary ms-2">Cancel</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <!-- End Search Bar -->

            <div class="row">
                <?php
                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                // Modify the query to include search functionality and exclude products with zero stock
                $query = "SELECT * FROM products WHERE stock > 0 AND (product_name LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%')";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card custom-card fixed-card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrivals-img-contnent">
                                            <img class="img-fluid" src="uploads/<?= $row['picture']; ?>"
                                                alt="<?= $row['product_name']; ?>">
                                        </div>
                                        <div class="new-arrival-content mt-3 col-mb-6">
                                            <h4><?= $row['product_name']; ?></h4>
                                            <span class="price">Rp.<?= number_format($row['price'], 2); ?></span>
                                            <p class="stock">Stock: <?= $row['stock']; ?></p>
                                        </div>
                                        <div class="buttons">
                                            <a href="add_to_cart.php?id=<?= $row['id_product']; ?>" class="add-to-cart">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                            <a href="detail.php?id_product=<?= $row['id_product']; ?>" class="detail">Detail</a>
                                        </div>
                                        <link rel="stylesheet"
                                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='text-center mt-4'>No products found!</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>