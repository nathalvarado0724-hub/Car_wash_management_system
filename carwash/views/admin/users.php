<?php
session_start();
require_once '../../model/admin_db.php';

$db = new Database();
$conn = $db->connect();

$query = "SELECT user_id, username, email, contact FROM user_tb";
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inventory Management</title>
   
  <link rel="stylesheet" href="../../assets/css/admin_navbar.css" />
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
      <img src="../../assets/logo.png" alt="logo" class="sidebar-logo">
      <h4 class="mt-2">Admin Page</h4>
    </div>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="dashboard.php" class="nav-link">
          <i class="fa-solid fa-house"></i> Dashboard
        </a>
      </li>

      <!-- Booking Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle " href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-calendar-check"></i> Bookings
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./bookings/new_bookings.php">New Bookings</a></li>
          <li><a class="dropdown-item" href="./bookings/completed_bookings.php">Completed Bookings</a></li>
          <li><a class="dropdown-item" href="./bookings/all_bookings.php">All Bookings</a></li>
        </ul>
      </li>

      <li>
        <a href="inventory_management.php" class="nav-link">
          <i class="fa-solid fa-folder-open"></i> Inventory Management
        </a>
      </li>
      
      <li>
        <a href="users.php" class="nav-link active">
            <i class="fa-regular fa-user"></i> Users
       </a>
      </li>  

      <!-- Pages Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-file-lines"></i> Pages
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./admin_pages/home.php">Home</a></li>
          <li><a class="dropdown-item" href="./admin_pages/services.php">Services</a></li>
           <li><a class="dropdown-item" href="./admin_pages/contact.php">Contact</a></li>
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
  <h2 class="mb-4">Clients List</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($users)): ?>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?= htmlspecialchars($user['user_id']) ?></td>
              <td><?= htmlspecialchars($user['username']) ?></td>
              <td><?= htmlspecialchars($user['email']) ?></td>
              <td><?= htmlspecialchars($user['contact']) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="text-center">No users found</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
