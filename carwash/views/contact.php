<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <!-- css -->
  <link rel="stylesheet" href="../assets/css/client_navbar.css" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .contact-header {
      background-color: #7089ad;
      color: white;
      text-align: center;
      padding: 50px 0;
    }
    .contact-header h2 {
      font-size: 2rem;
      font-weight: bold;
    }
    .contact-section {
      padding: 50px 0;
    }
    .contact-info {
      background: #7089ad;
      color: white;
      padding: 25px;
      border-radius: 8px;
    }
    #star-rating i {
      font-size: 1.5rem;
      cursor: pointer;
      transition: color 0.2s;
    }
    #star-rating i.text-warning {
      color: #ffc107 !important;
    }

  </style>
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
        <li><a href="home.php" class="nav-link"><i class="fa-solid fa-house"></i> <span class="link-text">Home</span></a></li>
        <li><a href="service.php" class="nav-link"><i class="fa-solid fa-bell-concierge"></i> <span class="link-text">Service</span></a></li>
        <li><a href="contact.php" class="nav-link active"><i class="fa-solid fa-phone"></i> <span class="link-text">Contact</span></a></li>
        <li><a href="admin.php" class="nav-link"><i class="fa-solid fa-gauge"></i> <span class="link-text">Dashboard</span></a></li>
        <li><a href="login.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i> <span class="link-text">Logout</span></a></li>
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
          <form id="contactForm">
            <div class="row mb-3">
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Your Name" required></div>
              <div class="col-md-6"><input type="email" class="form-control" placeholder="Your Email" required></div>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Subject" required>
            </div>
            <div class="mb-3">
              <textarea class="form-control" rows="4" placeholder="Message" required></textarea>
            </div>

            <!-- Rating -->
            <div class="mb-3">
              <label class="d-block">Rate Us:</label>
              <div id="star-rating">
                <i class="fa fa-star" data-value="1"></i>
                <i class="fa fa-star" data-value="2"></i>
                <i class="fa fa-star" data-value="3"></i>
                <i class="fa fa-star" data-value="4"></i>
                <i class="fa fa-star" data-value="5"></i>
              </div>
              <input type="hidden" name="rating" id="rating-value" required>
            </div>

            <button type="submit" class="btn btn-danger">Send Message</button>
          </form>
          <div id="successMessage" class="alert alert-success mt-3 d-none">
            ✅ Thank you for your feedback!
          </div>
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

    // Handle form submit
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      if (!ratingValue.value) {
        alert("Please select a rating before submitting.");
        return;
      }
      successMessage.classList.remove('d-none');
      form.reset();
      ratingValue.value = "";
      resetStars();
    });
  </script>
    <?php include '../include/footer.php'; ?>
</body>
</html>
