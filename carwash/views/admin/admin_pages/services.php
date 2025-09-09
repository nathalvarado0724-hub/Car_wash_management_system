<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Services</title>
   
 <link rel="stylesheet" href="../../../assets/css/admin_navbar.css" />
  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>

</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3">
<div class="text-center mb-4">
  <img src="../../../assets/logo.png" alt="logo" class="sidebar-logo">
  <h4 class="mt-2">Admin Page</h4>
</div>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="../dashboard.php" class="nav-link ">
          <i class="fa-solid fa-house"></i> Dashboard
        </a>
      </li>
 
      <!-- Booking Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-calendar-check"></i> Bookings
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../bookings/new_bookings.php">New Bookings</a></li>
          <li><a class="dropdown-item" href="../bookings/completed_bookings.php">Completed Bookings</a></li>
          <li><a class="dropdown-item" href="../bookings/all_bookings.php">All Bookings</a></li>
        </ul>
      </li>

      <li>
        <a href="../inventory_management.php" class="nav-link">
          <i class="fa-solid fa-folder-open"></i> Inventory Management
        </a>
      </li>

      <!-- Pages Dropdown -->
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle active" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-file-lines"></i> Pages
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./home.php">Home</a></li>
          <li><a class="dropdown-item" href="./services.php">Services</a></li>
           <li><a class="dropdown-item" href="./contact.php">Contact</a></li>
        </ul>
      </li>

      <li>
        <a href="logout.php" class="nav-link text-danger" onclick="return confirm('Are you sure you want to logout?');">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
      </li>
    </ul><h1>Admin services</h1>
  </div>


</body>
</html>
