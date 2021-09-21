
<?php
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB","project_inv");

$conn   = new mysqli('localhost', 'root', '', 'project_inv');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

echo $result->num_rows; 


if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        
        echo  $row ["notification"].":"
         . $row["description"];
    }
} else {
    echo "0 results";
}




$conn->close();
?>


