<?php
$servername = "localhost";
$username = "freeuser";
$password = "freepassword";
$dbname = "product_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, image FROM products";
$result = $conn->query($sql);

$products = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $products[] = $row;
  }
}

$conn->close();

echo json_encode($products);
?>
