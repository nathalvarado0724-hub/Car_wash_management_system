<?php
// dashboard_data.php

// Database connection settings
$host = "localhost";
$db = "cwms_db";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query for New Bookings
$newBookingsResult = $conn->query("SELECT COUNT(*) as count FROM appointment_tb WHERE status = 'pending'");
if (!$newBookingsResult) {
    die("Error in query (new bookings): " . $conn->error);
}
$newBookingsCount = $newBookingsResult->fetch_assoc()['count'] ?? 0;

// Query for Completed Bookings
$completedBookingsResult = $conn->query("SELECT COUNT(*) as count FROM appointment_tb WHERE status = 'completed'");
if (!$completedBookingsResult) {
    die("Error in query (completed bookings): " . $conn->error);
}
$completedBookingsCount = $completedBookingsResult->fetch_assoc()['count'] ?? 0;

// Query for Inventory Items
$inventoryResult = $conn->query("SELECT COUNT(*) as count FROM inventory_tb");
if (!$inventoryResult) {
    die("Error in query (inventory): " . $conn->error);
}
$inventoryCount = $inventoryResult->fetch_assoc()['count'] ?? 0;

// Query for users
$userResult = $conn->query("SELECT COUNT(*) as count FROM user_tb");
if (!$userResult) {
    die("Error in query (users): " . $conn->error);
}
$userCount = $userResult->fetch_assoc()['count'] ?? 0;
?>
