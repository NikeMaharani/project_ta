<?php
session_start(); // Make sure the session is started
include 'layout/header2.php';
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Checkout</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <form method="post" action="simpan_checkout.php">
                                    <!-- Personal Information section (uncomment if needed) -->
                                    <!--
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="phoneNumber" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phoneNumber" name="phone" placeholder="Phone number" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="cityInput" class="form-label">City</label>
                                            <input type="text" class="form-control" id="cityInput" name="city" placeholder="City" required>
                                        </div>
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="addressInput" class="form-label">Address</label>
                                                <textarea class="form-control" id="addressInput" name="address" rows="3" placeholder="Enter address" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center">
                                                <h6 class="card-title flex-grow-1 mb-0">Payment Information</h6>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Payment Method:</strong> Cash on Delivery (COD)</p>
                                                <p>Please have the exact amount ready for the delivery.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div>
                        </div>

                        <div class="col-xxl-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <h5 class="card-title mb-0">Order Summary</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless align-middle mb-0">
                                                    <thead class="table-active text-muted">
                                                        <tr>
                                                            <th style="width: 90px;" scope="col">Product</th>
                                                            <th scope="col">Product Info</th>
                                                            <th scope="col" class="text-end">Price</th>
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
                                                                
                                                                <input type="hidden" name="id_produk[]" value="<?= $id; ?>">
                                                                <input type="hidden" name="produk[]" value="<?= htmlspecialchars($product['name']);?>">
                                                                <input type="hidden" name="jumlah[]" value="<?= htmlspecialchars($product['quantity']);?>">
                                                                <tr>
                                                                    <td>
                                                                        <img src="uploads/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                                                    </td>
                                                                    <td><?= htmlspecialchars($product['name']); ?> (x<?= $product['quantity']; ?>)</td>
                                                                    <td class="text-end">Rp.<?= number_format($subtotal, 2); ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            echo '<tr><td colspan="3">Your cart is empty!</td></tr>';
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-end fw-bold mt-3">
                                                <h5>Total: Rp.<?= number_format($total, 2); ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end col-->

                        <div class="text-end mt-4">
                            <button class="btn btn-primary" type="submit">Confirm Order</button>
                            <a href="home.php" class="btn btn-secondary">Continue Shopping</a>
                        </div>
                    </div>
                </form> <!-- Closing the form here -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php
        include 'layout/footer.php';
        ?>
    </div>
</div>
