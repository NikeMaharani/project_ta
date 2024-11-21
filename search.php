<?php
include 'layout/header.php';
include 'koneksi.php';  // Assuming you have a connection file to your database

if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($koneksi, $_GET['query']);
    
    // SQL query to search for the products
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$query%' OR description LIKE '%$query%'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h4>Search Results:</h4>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<h5>" . $row['product_name'] . "</h5>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Price: Rp." . number_format($row['price'], 0, ',', '.') . "</p>";
            echo "<p>Stock: " . $row['stock'] . "</p>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>No products found.</p>";
    }
} else {
    echo "<p>Please enter a search query.</p>";
}

include 'layout/footer.php';
?>
