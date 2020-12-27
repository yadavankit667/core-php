<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "corephp_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
// user123 password username user
?>
