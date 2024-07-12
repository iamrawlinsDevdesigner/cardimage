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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $image = $_FILES['image']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($image);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
    $sql = "INSERT INTO products (title, image) VALUES ('$title', '$target_file')";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$conn->close();
?>
