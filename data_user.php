<?php
include 'layout/header.php';
?>
<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Data User</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Data User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <!-- Search Form with Cancel Button -->
            <div class="row mb-3">
                <div class="col-12">
                    <form class="d-flex" action="data_user.php" method="get">
                        <input type="text" class="form-control" name="search" placeholder="Search by Username or Email" aria-label="Search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="btn btn-primary ms-2" type="submit">Search</button>
                        <?php if (isset($_GET['search']) && $_GET['search'] != ''): ?>
                            <a href="data_user.php" class="btn btn-secondary ms-2">Cancel</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <!-- End Search Form -->

            <div id="productList">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="col-xxl col-sm-6"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title mb-0">User Data</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered align-middle table-nowrap mb-0">
                                    <thead class="table-active">
                                        <tr>
                                            <th> </th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Id User</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <?php
                                        include "koneksi.php";
                                        $no = 1;
                                        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                                        // Search query
                                        $query = "SELECT * FROM multi_user WHERE username LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%'";
                                        $data = mysqli_query($koneksi, $query);

                                        if (mysqli_num_rows($data) > 0) {
                                            while ($row = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= htmlspecialchars($row['username']); ?></td>
                                                    <td><?= htmlspecialchars($row['email']); ?></td>
                                                    <td><?= htmlspecialchars($row['password']); ?></td>
                                                    <td><?= htmlspecialchars($row['id_multi']); ?></td>
                                                    <td><?= htmlspecialchars($row['role']); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger" onclick="confirmDelete(<?= $row['id_multi']; ?>)">
                                                            <i class="ph-trash align-middle me-1"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo '<tr><td colspan="7" class="text-center">No users found matching your search criteria.</td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>

<!-- JavaScript for delete confirmation -->
<script type="text/javascript">
    function confirmDelete(id_user) {
        var confirmation = confirm("Are you sure you want to delete this user?");
        if (confirmation) {
            window.location.href = "delete_user.php?id_user=" + id_user;
        }
    }
</script>
