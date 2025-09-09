<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <!-- css -->
     <link rel="stylesheet" href="../assets/css/client_navbar.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
        <!-- Bootstrap CSS (v3.4.1) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
      body {
      background-color: #f8f9fa;
    }
    .contact-header {
      background-color: #7089adff;
      color: white;
      text-align: center;
      padding: 50px 0;
    }
    .contact-header h2 {
      font-size: 2rem;
      font-weight: bold;
    }
  </style>
</head>
<body>
 <div class="topnav">
    <div class="navbar">
        <div class="logo">
            <img src="../assets/logo.png" alt="logo" width="200" height="200"  >
            <span>CrystalClean</span>
        </div>
           <ul class="horizontal-list">
                <li>
                    <a href="home.php" class="nav-link">
                        <i class="fa-solid fa-house"></i>
                        <span class="link-text">Home</span>
                    </a>
                </li>
                <li>
                    <a href="service.php" class="nav-link active">
                        <i class="fa-solid fa-bell-concierge"></i>
                        <span class="link-text">Service</span>
                    </a>
                </li>
                <li>
                    <a href="contact.php" class="nav-link">
                        <i class="fa-solid fa-phone"></i>
                        <span class="link-text">Contact</span>
                    </a>
                </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Booking
            </a>
            <ul class="dropdown-menu" aria-labelledby="bookingDropdown">
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#appointmentModal">Make an Appointment</a></li>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#bookingModal"> View Bookings</a></li>
            </ul>
          </li>
                <li>
                    <a href="./admin/admin_login.php" class="nav-link">
                        <i class="fa-solid fa-user-tie"></i>
                        <span class="link-text">Admin</span>
                    </a>
                </li>
                <li>
                  <a href="login.php" class="nav-link" onclick="return confirmLogout();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="link-text">Logout</span>
                  </a>
                </li>
            </ul>
        </div>
     </div>

       <!-- Contact Header -->
  <section class="contact-header">
    <h2>Services</h2>
    <p>Home / Service</p>
  </section>

   
<section class="services-section py-5">
  <div class="container">
    <h3 class="text-center mb-5">Choose Your Plan</h3>
    <div class="row justify-content-center">
      
      <!-- Basic Cleaning -->
      <div class="col-md-4 mb-4">
        <div class="card text-center h-100 shadow">
          <div class="card-body">
            <h5 class="card-title text-uppercase">Basic Cleaning</h5>
            <h2 class="card-price">Rs. <span class="fs-1">100</span>.99</h2>
            <ul class="list-unstyled mt-3 mb-4">
              <li><i class="fa-solid fa-check text-success"></i> Seats Washing</li>
              <li><i class="fa-solid fa-check text-success"></i> Vacuum Cleaning</li>
              <li><i class="fa-solid fa-check text-success"></i> Exterior Cleaning</li>
              <li><i class="fa-solid fa-times text-danger"></i> Interior Wet Cleaning</li>
              <li><i class="fa-solid fa-times text-danger"></i> Window Wiping</li>
            </ul>
            <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Premium Cleaning -->
      <div class="col-md-4 mb-4">
        <div class="card text-center h-100 shadow border-primary">
          <div class="card-body">
            <h5 class="card-title text-uppercase text-danger">Premium Cleaning</h5>
            <h2 class="card-price text-danger">Rs. <span class="fs-1">200</span>.99</h2>
            <ul class="list-unstyled mt-3 mb-4">
              <li><i class="fa-solid fa-check text-success"></i> Seats Washing</li>
              <li><i class="fa-solid fa-check text-success"></i> Vacuum Cleaning</li>
              <li><i class="fa-solid fa-check text-success"></i> Exterior Cleaning</li>
              <li><i class="fa-solid fa-check text-success"></i> Interior Wet Cleaning</li>
              <li><i class="fa-solid fa-times text-danger"></i> Window Wiping</li>
            </ul>
            <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Complex Cleaning -->
      <div class="col-md-4 mb-4">
        <div class="card text-center h-100 shadow">
          <div class="card-body">
            <h5 class="card-title text-uppercase">Complex Cleaning</h5>
            <h2 class="card-price">Rs. <span class="fs-1">300</span>.99</h2>
            <ul class="list-unstyled mt-3 mb-4">
              <li><i class="fa-solid fa-check text-success"></i> Seats Washing</li>
              <li><i class="fa-solid fa-check text-success"></i> Vacuum Cleaning</li>
              <li><i class="fa-solid fa-check text-success"></i> Exterior Cleaning</li>
              <li><i class="fa-solid fa-check text-success"></i> Interior Wet Cleaning</li>
              <li><i class="fa-solid fa-check text-success"></i> Window Wiping</li>
            </ul>
            <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal">Book Now</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<script>
  function confirmLogout() {
    return confirm("Are you sure you want to log out?");
  }
</script>
<?php include 'booking_modal.php'; ?>
  <?php include 'appointment_modal.php'; ?>
   <?php include '../include/footer.php'; ?>
</body>
</html>