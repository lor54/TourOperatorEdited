<?php
$servername = "10.6.0.2";
$username = "touroperator";
$password = "touroperator123";
$database = "touroperator";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>