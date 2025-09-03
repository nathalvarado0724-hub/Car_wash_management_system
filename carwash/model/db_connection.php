<?php
// db_connection.php
$servername = "localhost"; // or your server IP/host
$username = "root";
$password = "";
$dbname = "cwms_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
