<?php
session_start(); // Required to access $_SESSION['user_id']

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<tr><td colspan='5' class='text-center'>User is not logged in.</td></tr>";
    exit;
}

$host = "localhost";
$db = "cwms_db";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id']; // ✅ Get user_id from session (secure)

$sql = "SELECT 
            s.title, 
            a.car_type, 
            a.appointment_date, 
            a.appointment_time, 
            a.status 
        FROM appointment_tb a
        JOIN services_tb s ON a.service_id = s.service_id
        WHERE a.user_id = ? 
        ORDER BY a.appointment_date DESC";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['title']}</td>
            <td>{$row['car_type']}</td>
            <td>{$row['appointment_date']}</td>
            <td>{$row['appointment_time']}</td>
            <td><span class='badge bg-";
        
        switch ($row['status']) {
            case 'pending': echo "warning"; break;
            case 'confirmed': echo "primary"; break;
            case 'completed': echo "success"; break;
            case 'cancelled': echo "danger"; break;
            default: echo "secondary"; break;
        }

        echo "'>{$row['status']}</span></td></tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No bookings found.</td></tr>";
}

$stmt->close();
$conn->close();
?>
