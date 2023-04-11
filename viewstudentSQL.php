<?php
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve student information
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);

// Display student information
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Name: " . $row["name"] . "<br>";
    echo "ID: " . $row["id"] . "<br>";
    echo "Program: " . $row["program"] . "<br>";
    echo "Advisor: " . $row["advisor"] . "<br>";
  }
} else {
  echo "0 results";
}

// Close connection
$conn->close();
?>

