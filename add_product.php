<?php
include 'layout/header.php';
?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Add Product</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-4">
                                    <h5 class="card-title mb-3">Product Information</h5>

                                </div>


                                <div class="col-xxl-8">
                                    <form action="simpan_product.php" method="post" enctype="multipart/form-data">
                                        <div class="col-xxl-8">
                                            <div class="mb-3">
                                                <label class="form-label">Gambar Produk</label>
                                                <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_name" class="form-label">Nama Produk </label>
                                            <input type="text" class="form-control" id="product_name"
                                                name="product_name" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi </label>
                                            <textarea class="form-control" id="description" name="description" rows="5"
                                                required></textarea>
                                        </div>

                                        <div class="col-lg-4">
                                            <div>
                                                <label for="productStocks" class="form-label">Stock </label>
                                                <input type="number" class="form-control" id="productStocks" name="stock" required>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-4">
                                            <div>
                                                <label class="form-label" for="price">Harga</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="price">Rp.</span>
                                                    <input type="number" class="form-control" id="product-price-input"
                                                         name="price"
                                                        aria-label="Price" aria-describedby="product-price-addon"
                                                        required="">

                                                </div>
                                            </div>



                                            <div class="hstack gap-2 justify-content-end mb-3">
                                            </div>
                                    </form>
                                    <a href="product.php">
                                        <button class="btn btn-danger"><i class="ph-x align-middle"></i> Batal</button>
                                    </a>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                </div><!--end col-->
            </div>
        </div><!--end row-->
    </div>
</div><!--end row-->
</div>
</div>
</div><!--end col-->
</div><!--end row-->


</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php
include 'layout/footer.php'
    ?>