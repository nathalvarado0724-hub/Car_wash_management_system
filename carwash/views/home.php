<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: ../views/login.php");
    exit;}
    
include '../model/db_connection.php';

$db = new Database();
$conn = $db->connect();

$carouselSql = "SELECT title, description, img_url FROM services_tb";
$carouselResult = $conn->query($carouselSql);
?>


  <!-- Head -->
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../assets/css/client_navbar.css" />
    <link rel="stylesheet" href="../assets/css/client_home.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- In <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <div class="topnav">
      <div class="navbar">
        <div class="logo">
          <img src="../assets/logo.png" alt="logo" width="200" height="200">
          <span>CrystalClean</span>
        </div>
        <ul class="horizontal-list">
          <li>
            <a href="home.php" class="nav-link active">
              <i class="fa-solid fa-house"></i
              ><span class="link-text">Home</span>
            </a>
          </li>
          <li>
            <a href="service.php" class="nav-link">
              <i class="fa-solid fa-bell-concierge"></i>
              <span class="link-text">Service</span></a>
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

    <!-- Content Wrapper -->
    <div class="content">

      <!-- Welcome Section -->
      <div class="content welcome-section text-center py-5">
        <h1>Welcome to CrystalClean Car Wash!</h1>
        <p>Fast, affordable, and professional car cleaning services at your fingertips.</p>
        <p>At CrystalClean Car Wash, we’re committed to making your car shine like new! Book appointments, choose from a wide range of services, and enjoy the convenience of real-time tracking — all from one platform.</p>
      </div>

      <!-- Carousel Section -->
      <div class="container my-carousel-wrapper p-3">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
     
             <!-- indicators -->
        <div class="carousel-indicators">
            <?php
            $carouselResult->data_seek(0); // Reset result pointer to the start
            $numSlides = $carouselResult->num_rows;
            for ($i = 0; $i < $numSlides; $i++): ?>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active"' : '' ?>></button>
            <?php endfor; ?>
        </div>
         <!--carouser content here-->
        <div class="carousel-inner">
          <?php
          $isFirst = true;
          while ($row = $carouselResult->fetch_assoc()):
          ?>
            <div class="carousel-item <?php echo $isFirst ? 'active' : ''; ?>">
              <img src="<?php echo htmlspecialchars($row['img_url']); ?>" class="d-block w-100" alt="Service Image">
              <div class="carousel-caption d-none d-md-block">
                <h5><?php echo htmlspecialchars($row['title']); ?></h5>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
              </div>
            </div>
          <?php
            $isFirst = false;
          endwhile;
          ?>
        </div>

          <!-- Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
 

        <!-- Link to Services -->
        <div class="link-service text-center mt-4">
          <a href="./service.php" class="btn btn-primary">See Services</a>
        </div>
      </div>
  <br><br><br><br>
    <!-- About Section -->
<div class="about-section my-5">
  <div class="container">
    <div class="about text-center mb-4 fs-2 fw-bold">About</div><br>
    <hr class="featurette-divider"><br>

    <div class="row featurette align-items-center">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">
          CrystalClean <span class="text-muted">Car Wash</span>
        </h2>
        <p class="lead">
          At CrystalClean Car Wash, we believe that a clean car is a happy car — and a happy customer!
          We are dedicated to providing top-quality car cleaning services that are fast, affordable, and eco-friendly.
          With our easy-to-use online appointment system and skilled team of professionals, keeping your car in pristine condition has never been easier.
          Whether you're looking for a quick exterior wash or a full detailing package, we've got you covered!
        </p>
      </div>

      <div class="col-md-5 order-md-1">
        <img 
          src="https://washnwhips.com/cdn/shop/articles/The_Significance_of_Professional_Car_Detailing-_More_Than_Just_a_Clean_Car.jpg?v=1720719551" 
          alt="Car detailing"
          class="img-fluid featurette-image mx-auto d-block rounded shadow"
          width="500"
          height="500"
        >
      </div>
    </div>
  </div>
</div><br><br>

<!-- Why Choose Us Section -->
<div class="about-section my-5">
  <div class="container">
    <div class="about text-center mb-4 fs-2 fw-bold">Why Choose Us?</div><br>
 
    <!-- Experienced Staff -->
    <div class="row featurette align-items-center">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Experienced Staff:</h2>
        <p class="lead">
          Our experienced staff are skilled professionals dedicated to providing meticulous car care,
          ensuring every vehicle receives the highest quality service with attention to detail and care.
        </p>
      </div>

      <div class="col-md-5 order-md-1">
        <img 
          src="https://thumb.photo-ac.com/aa/aa5fe1b4433ed320919e34c3d0cc6e96_t.jpeg" 
          alt="Experienced Staff"
          class="img-fluid featurette-image mx-auto d-block rounded shadow"
          width="500"
          height="500"
        >
      </div>
    </div><br><br>

    <hr class="featurette-divider"><br><br>

    <!-- Eco-Friendly Products -->
    <div class="row featurette align-items-center">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Eco-Friendly Products:</h2>
        <p class="lead">
          At CrystalClean Car Wash, we believe that a sparkling clean car shouldn’t come at the expense of the environment.
          That’s why we exclusively use eco-friendly, biodegradable cleaning products that are tough on dirt but gentle on nature.
          Our soaps and degreasers are free from harsh chemicals, phosphates, and toxic residues, ensuring your car gets a thorough, 
          professional clean without polluting local waterways or harming aquatic life.
          Not only are our solutions safe for the environment, but they also help protect your car’s paint, finish, and interior 
          by maintaining pH balance and avoiding abrasive ingredients.
          Choosing us means choosing a cleaner car and a cleaner planet — because sustainability is at the heart of what we do.
        </p>
      </div>

      <div class="col-md-5 order-md-1">
        <img 
          src="https://m.media-amazon.com/images/I/81Q-g4jh+bL._AC_SL1500_.jpg" 
          alt="Eco-Friendly Products"
          class="img-fluid featurette-image mx-auto d-block rounded shadow"
          width="500"
          height="500"
        >
      </div>
    </div><br><br>

    <hr class="featurette-divider"><br><br>

    <!-- Quick & Efficient -->
    <div class="row featurette align-items-center">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Quick & Efficient:</h2>
        <p class="lead">
          At CrystalClean, we understand your time is valuable.
          That’s why our team is trained to provide quick and efficient car wash services without sacrificing quality. 
          From start to finish, we streamline every step of the process — whether it’s a basic wash or a full detailing — 
          so you can enjoy a spotless car and be on your way faster.
          Our state-of-the-art equipment and experienced staff work together to ensure your vehicle receives a thorough clean 
          in the shortest possible time, making your experience smooth, convenient, and hassle-free.
        </p>
      </div>

      <div class="col-md-5 order-md-1">
        <img 
          src="https://mkcarwash.com/wp-content/uploads/2023/11/cwash.jpg"
          alt="Quick and Efficient"
          class="img-fluid featurette-image mx-auto d-block rounded shadow"
          width="500"
          height="500"
        >
      </div>
    </div>
  </div>
</div>


    </div> <!-- End content -->
    
<script>
  function confirmLogout() {
    return confirm("Are you sure you want to log out?");
  }
</script>
       <?php include 'appointment_modal.php'; ?>
     <?php include 'booking_modal.php'; ?>
 <?php include '../include/footer.php'; ?>

 <!-- Before </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
