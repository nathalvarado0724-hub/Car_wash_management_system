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
 
   <?php include '../include/footer.php'; ?>
</body>
</html>