<!------------ Fetch Data for Search ---------->
<?php
$dont_show = false;
$conn   = new mysqli('localhost', 'root', '', 'project_inv');
if (isset($_GET['search'])) {
    $searchKey = $_GET['search'];
    $sql    = "SELECT * FROM products WHERE product_name LIKE '%$searchKey%'";
    $result = $conn->query($sql);
} else
    $dont_show = true;
?>