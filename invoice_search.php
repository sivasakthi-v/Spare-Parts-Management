<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/");
}
// $dont_show = false;
$conn   = new mysqli('localhost', 'root', '', 'project_inv');
$sql    = "SELECT * FROM invoice";
$result = $conn->query($sql);
#else
#$dont_show = true;

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
