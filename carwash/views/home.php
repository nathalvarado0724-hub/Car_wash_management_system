<?php
require_once __DIR__ . '/../model/db_connection.php';
require_once __DIR__ . '/../model/service.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- css -->
     <link rel="stylesheet" href="../assets/css/client_navbar.css" />
      <link rel="stylesheet" href="../assets/css/client_home.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <!-- bootstrap -->
      <!-- Bootstrap CSS (v3.4.1) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  

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
                    <a href="home.php" class="nav-link active">
                        <i class="fa-solid fa-house"></i>
                        <span class="link-text">Home</span>
                    </a>
                </li>
                <li>
                    <a href="service.php" class="nav-link">
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
                <li>
                    <a href="admin.php" class="nav-link">
                        <i class="fa-solid fa-gauge"></i>
                        <span class="link-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="login.php" class="nav-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="link-text">Logout</span>
                    </a>
                </li>
            </ul>
    </div>
 </div>
 <div class="content">
   
  <!-- 💬 Welcome Section -->
  <div class="content welcome-section">
    <h1>Welcome to CrystalClean Car Wash!</h1>
    <p>Fast, affordable, and professional car cleaning services at your fingertips.</p>
    <p>At CrystalClean Car Wash, we’re committed to making your car shine like new! Book appointments, choose from a wide range of services, and enjoy the convenience of real-time tracking — all from one platform.</p>
  </div>

       <div class="container my-carousel-wrapper p-3">
         <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
      
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://www.carnawash.com.au/wp-content/uploads/2025/03/carwash.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First Slide</h5>
              <p>Description for first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://media.istockphoto.com/id/1800033825/photo/hand-cleaning-the-car-interior-with-microfiber-cloth-towel.jpg?s=612x612&w=0&k=20&c=bz4YG60xCvOifo0jz1BbThdW0lA1hWS9I85o-Wdxj0A=" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second Slide</h5>
              <p>Description for second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://abaacservices.com/wp-content/uploads/2025/06/Car-Wash-Services-Near-You-in-Dabar-WhatMakes-This-Service-Stand-Out.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third Slide</h5>
              <p>Description for third slide.</p>
            </div>
          </div>
        </div>
      
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
       <div class="link-service">
         <a href="./service.php">See Services</a>
      </div>
       </div><br><br><hr>
    <div class="about-us">
      <div class="about">About Us</div>
      <div class="container my-5">
  <div class="row align-items-center ">
    <div class="col-md-8">
      <h2 class="title"><strong>CrystalClean</strong></h2>
      <p class="paragraph">
       At CrystalClean Car Wash, we believe that a clean car is a happy car — and a happy customer!
       We are dedicated to providing top-quality car cleaning services that are fast, affordable, and eco-friendly.
       With our easy-to-use online appointment system and skilled team of professionals, keeping your car in pristine condition has never been easier.
       Whether you're looking for a quick exterior wash or a full detailing package, we've got you covered!
      </p>
    </div>
    <div class="col-md-4">
      <img src="https://washnwhips.com/cdn/shop/articles/The_Significance_of_Professional_Car_Detailing-_More_Than_Just_a_Clean_Car.jpg?v=1720719551" class="img-fluid" alt="Boracay White Beach" >
    </div>
  </div>

    </div>
 </div>
</body>
</html>