<?php
session_start();

$host = "localhost";
$db = "cwms_db";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle actions (confirm, delete)
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    if ($_GET['action'] == 'done') {
        $conn->query("UPDATE appointment_tb SET status='completed' WHERE appointment_id = $id");
    } elseif ($_GET['action'] == 'delete') {
        $conn->query("DELETE FROM appointment_tb WHERE appointment_id = $id");
    }
}


$sql = "SELECT 
    a.appointment_id,
    u.username,
    s.title AS service_title,
    a.car_type,
    a.appointment_date,
    a.appointment_time,
    a.status
FROM appointment_tb a
JOIN user_tb u ON a.user_id = u.user_id
JOIN services_tb s ON a.service_id = s.service_id
ORDER BY a.appointment_date DESC";


$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
   
  <link rel="stylesheet" href="../../../assets/css/admin_navbar.css" />
  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>

</head>

<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3" style="width: 250px; height: 100vh;">
    <div class="text-center mb-4">
      <img src="../../../assets/logo.png" alt="logo" class="sidebar-logo">
      <h4 class="mt-2">Admin Page</h4>
    </div>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="../dashboard.php" class="nav-link">
          <i class="fa-solid fa-house"></i> Dashboard
        </a>
      </li>

      <!-- Booking Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-calendar-check"></i> Bookings
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./new_bookings.php">New Bookings</a></li>
          <li><a class="dropdown-item" href="./completed_bookings.php">Completed Bookings</a></li>
          <li><a class="dropdown-item" href="./all_bookings.php">All Bookings</a></li>
        </ul>
      </li>

      <li>
        <a href="../inventory_management.php" class="nav-link">
          <i class="fa-solid fa-folder-open"></i> Inventory Management
        </a>
      </li>
      
      <li>
        <a href="../users.php" class="nav-link">
            <i class="fa-regular fa-user"></i> Users
       </a>
      </li>  

      <!-- Pages Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-file-lines"></i> Pages
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../admin_pages/home.php">Home</a></li>
          <li><a class="dropdown-item" href="../admin_pages/services.php">Services</a></li>
          <li><a class="dropdown-item" href="../admin_pages/contact.php">Contact</a></li>
        </ul>
      </li>

      <li>
        <a href="logout.php" class="nav-link text-danger" onclick="return confirm('Are you sure you want to logout?');">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
      </li>
    </ul>
  </div>
  
<div class="container mt-5">
    <h2 class="mb-4">All Bookings</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Service</th>
                <th>Car Type</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['appointment_id'] ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                  
                    <td><?= htmlspecialchars($row['service_title']) ?></td>
                    <td><?= htmlspecialchars($row['car_type']) ?></td>
                    <td><?= $row['appointment_date'] ?></td>
                    <td><?= $row['appointment_time'] ?></td>
                    <td>
                        <span class="badge bg-<?= match($row['status']) {
                            'pending' => 'warning',
                            'confirmed' => 'primary',
                            'completed' => 'success',
                            'cancelled' => 'danger',
                            default => 'secondary'  
                        } ?>">
                            <?= ucfirst($row['status']) ?>
                        </span>
                    </td>
                  <td>
    <a href="edit_booking.php?id=<?= $row['appointment_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
    <a href="?action=delete&id=<?= $row['appointment_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this booking?')">Delete</a>
</td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="8" class="text-center">No bookings found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
$conn->close();
?>