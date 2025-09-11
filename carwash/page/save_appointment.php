<?php

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: ../views/login.php");
    exit;}
    
// DB connection
$host = "localhost";
$db = "cwms_db";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Use session for user_id
if (!isset($_SESSION['user_id'])) {
    die("User is not logged in.");
}
$user_id = $_SESSION['user_id'];

// Get values from POST
$service_id = $_POST['service_id'];
$car_type = $_POST['car_type'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];

// Insert into appointment_tb
$sql = "INSERT INTO appointment_tb (user_id, service_id, car_type, appointment_date, appointment_time)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("iisss", $user_id, $service_id, $car_type, $appointment_date, $appointment_time);

if ($stmt->execute()) {
    echo "<script>
        alert('Appointment booked successfully!');
        window.location.href = '../views/home.php';
    </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
