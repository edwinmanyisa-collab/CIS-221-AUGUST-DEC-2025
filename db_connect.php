<?php
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = "";     // leave empty if you don’t have a MySQL password
$dbname = "fashion_store";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>