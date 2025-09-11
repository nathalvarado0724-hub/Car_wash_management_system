<?php
require_once '../model/db_connection.php';

$db = new Database();
$conn = $db->connect();

// Insert data if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data safely (you might want to sanitize more carefully)
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $img_url = $conn->real_escape_string($_POST['img_url']);
    $price = (int)$_POST['price']; // cast to int for safety

    // Insert query
    $sql = "INSERT INTO services_tb (title, description, img_url, price) VALUES ('$title', '$description', '$img_url', $price)";
    if ($conn->query($sql) === TRUE) {
        echo "New service added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all services to display
$sql = "SELECT * FROM services_tb";
$result = $conn->query($sql);
?>