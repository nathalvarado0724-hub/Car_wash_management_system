<?php include '../page/services_data.php';?>


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

        <!-- In <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
    .flip-card {
  perspective: 1000px;
  width: 100%;
  max-height: 200px;
  overflow: hidden;
}
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 200px;
  transition: transform 0.6s;
  transform-style: preserve-3d;
}
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}
.flip-card-front img {
  object-fit: cover;
  width: 100%;
  height: 100%;
}
.flip-card-back {
  background-image: url("../assets/logo.png");
  background-repeat:no-repeat;
     background-position: center;
    background-size: cover;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  transform: rotateY(180deg);
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

   
<h2 class="text-center my-4"> <span>Car Wash</span> Services </h2>
<p class="text-center my-4"> Choose from a range of car cleaning services including exterior washing,
   interior cleaning, full detailing, and quick express washes to keep your vehicle looking its best.</p>

<div class="container">
  <div class="row justify-content-center gx-4 gy-4 px-3">
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 d-flex">
                <div class="card h-100 w-100 p-3">
                          <!-- flipcard here!!! -->
                    <div class="flip-card">
                      <div class="flip-card-inner">
                        <div class="flip-card-front">
                           <img src="<?php echo htmlspecialchars($row['img_url']); ?>" alt="Service Image" class="card-img-top">
                        </div>
                        <div class="flip-card-back" >
                           <!-- content / back of the flip-card -->
                         <a href="appointment_modal.php" class="btn btn-light btn-sm bg-wihte" data-bs-toggle="modal" data-bs-target="#appointmentModal">  
                          Book Now
                         </a>
                        </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo htmlspecialchars($row['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <strong>Price:</strong> ₱<?php echo $row['price']; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-center">No services found.</p>
    <?php endif; ?>
  </div>
</div>



<script>
  function confirmLogout() {
    return confirm("Are you sure you want to log out?");
  }
</script>
<?php include 'booking_modal.php'; ?>
  <?php include 'appointment_modal.php'; ?>
   <?php include '../include/footer.php'; ?>

   <!-- Before </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>