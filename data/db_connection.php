<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fas7ni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>