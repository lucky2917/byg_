<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "byg_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>