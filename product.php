<?php
include 'layout/header.php';
?>

<style>
    td.description-column {
        white-space: normal;
        word-wrap: break-word;
    }

    table {
        table-layout: fixed;
        width: 100%;
    }

    td, th {
        padding: 10px;
        text-align: left;
        vertical-align: top;
        word-wrap: break-word;
        white-space: normal;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Data Produk</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Data Produk</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Search Bar -->
            <div class="row mb-3">
                <div class="col-12">
                    <form class="d-flex" action="product.php" method="get">
                        <input type="text" class="form-control" name="search" placeholder="Search by product name" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="btn btn-primary ms-2" type="submit">Search</button>
                        <?php if (isset($_GET['search']) && $_GET['search'] != ''): ?>
                            <a href="product.php" class="btn btn-secondary ms-2">Cancel</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

            <!-- Product List -->
            <div id="productList">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Products</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <a href="add_product.php">
                                            <button type="button" class="btn btn-primary add-btn"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Product</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered align-middle table-nowrap mb-0">
                                        <thead class="table-active">
                                            <tr>
                                                <th>No</th>
                                                <th>Products</th>
                                                <th>Product Name</th>
                                                <th>Description</th>
                                                <th>Stock</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <?php
                                            include "koneksi.php";
                                            
                                            // Get search query
                                            $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                                            // Query to fetch products based on the search term
                                            $query = "SELECT * FROM products WHERE product_name LIKE '%$searchTerm%'";
                                            $data = mysqli_query($koneksi, $query);
                                            $no = 1;
                                            
                                            if (mysqli_num_rows($data) > 0) {
                                                while ($row = mysqli_fetch_array($data)) {
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><img src="./uploads/<?= $row['picture'] ?>" alt="<?= $row['product_name'] ?>" width="100px"></td>
                                                <td><?= $row['product_name']; ?></td>
                                                <td class="description-column"><?= $row['description']; ?></td>
                                                <td><?= $row['stock']; ?></td>
                                                <td><?= $row['price']; ?></td>
                                                <td>
                                                    <a href="edit_product.php?id_product=<?= $row['id_product'] ?>">
                                                        <button type="button" class="btn btn-warning"><i class="ph-pencil align-middle me-1"></i></button>
                                                    </a>
                                                    <a href="delete_product.php?id_product=<?= $row['id_product'] ?>">
                                                        <button type="button" class="btn btn-danger"><i class="ph-trash align-middle me-1"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            } else {
                                                echo '<tr><td colspan="7" class="text-center">No products found</td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
</div>
<!-- End Page-content -->

<?php
include 'layout/footer.php';
?>
