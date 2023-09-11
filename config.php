<?php
// Replace these values with your actual database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "your_db_name";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>