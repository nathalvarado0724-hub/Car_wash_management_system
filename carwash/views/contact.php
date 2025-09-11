
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <!-- css -->
  <link rel="stylesheet" href="../assets/css/client_navbar.css" />
  <link rel="stylesheet" href="../assets/css/client_contact.css" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

      <!-- In <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <!-- Navbar -->
  <div class="topnav">
    <div class="navbar">
      <div class="logo">
        <img src="../assets/logo.png" alt="logo" width="200" height="200">
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
          <a href="service.php" class="nav-link">
            <i class="fa-solid fa-bell-concierge"></i>
             <span class="link-text">Service</span>
          </a>
        </li>
        <li>
          <a href="contact.php" class="nav-link active">
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
    <h2>Contact Us</h2>
    <p>Home / Contact</p>
  </section>

  <!-- Contact Content -->
  <section class="contact-section">
    <div class="container">
      <div class="row g-4">
        <!-- Contact Info -->
        <div class="col-md-4">
          <div class="contact-info">
            <h5>Quick Contact Info</h5>
            <p><i class="fa fa-map-marker-alt"></i> 123 Street, New York, USA</p>
            <p><i class="fa fa-clock"></i> Mon - Fri: 9:00 AM - 6:00 PM</p>
            <p><i class="fa fa-phone"></i> +123456789</p>
            <p><i class="fa fa-envelope"></i> info@example.com</p>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="col-md-8">
          <h4 class="mb-4">Get In Touch</h4>
         <form id="contactForm" method="POST" action="../page/contact_process.php">
              <div class="row mb-3">
                <div class="col-md-6">
                  <input type="number" class="form-control" name="contact_number" placeholder="Your Phone" required>
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
              </div>
              <div class="mb-3">
                <textarea class="form-control" rows="4" name="message" placeholder="Message" required></textarea>
              </div>
            
              <div class="mb-3">
                <label class="d-block">Rate Us:</label>
                <div id="star-rating">
                  <i class="fa fa-star" data-value="1"></i>
                  <i class="fa fa-star" data-value="2"></i>
                  <i class="fa fa-star" data-value="3"></i>
                  <i class="fa fa-star" data-value="4"></i>
                  <i class="fa fa-star" data-value="5"></i>
                </div>
                <input type="hidden" name="rating" id="rating-value">
              </div>
            
              <button type="submit" class="btn btn-danger" name="submit">Send Message</button>
            </form>
          <div id="successMessage" class="alert alert-success mt-3 d-none">
            ✅ Thank you for your feedback!
          </div>

        </div>
      </div>
          <!-- Google Map Embed -->
<div class="mt-5">
  <h5 class="mb-3">Find Us on Map</h5>
  <div class="map-responsive">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.905217205667!2d-74.0059726845942!3d40.71277597933042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQyJzQ2LjAiTiA3NMKwMDAnMjMuNiJX!5e0!3m2!1sen!2sus!4v1614252787413!5m2!1sen!2sus"
      width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</div>

    </div>
  </section>

 
  <!-- Star Rating Script -->
  <script>
    const stars = document.querySelectorAll('#star-rating i');
    const ratingValue = document.getElementById('rating-value');
    const form = document.getElementById('contactForm');
    const successMessage = document.getElementById('successMessage');

    stars.forEach(star => {
      star.addEventListener('mouseover', function() {
        resetStars();
        highlightStars(this.getAttribute('data-value'));
      });

      star.addEventListener('click', function() {
        ratingValue.value = this.getAttribute('data-value');
        resetStars();
        highlightStars(ratingValue.value);
      });

      star.addEventListener('mouseout', function() {
        resetStars();
        if (ratingValue.value) {
          highlightStars(ratingValue.value);
        }
      });
    });

    function resetStars() {
      stars.forEach(s => s.classList.remove('text-warning'));
    }

    function highlightStars(value) {
      for (let i = 0; i < value; i++) {
        stars[i].classList.add('text-warning');
      }
    }

  </script>
  
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
