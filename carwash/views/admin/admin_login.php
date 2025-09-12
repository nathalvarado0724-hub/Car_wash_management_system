<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login</title>
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../assets/css/client_login.css" />
  
  <!-- Bootstrap CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
  />
  
  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>
  
 <form action="../../page/login_admin_process.php" method="POST"  class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh; max-width: 400px;">
    
    <div class="login-box text-center p-4 shadow rounded" style="width: 100%;">
      <img src="../../assets/logo.png" alt="Logo" class="login-img mb-3" style="max-width: 100px;" />
      <h1 class="mb-4">Admin Login</h1>

      <div class="form-group text-left">
        <label for="name">Name:</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Your username"
          class="form-control"
          required
        />
      </div>

      <div class="form-group text-left">
        <label for="pass">Password:</label>
        <input
          type="password"
          id="pass"
          name="pass"
          placeholder="Your password"
          class="form-control"
          required
        />
      </div>

      <button type="submit" name="login" class="btn btn-primary btn-block mt-4">
        Login
      </button>
    </div>

    <div class="login mt-3">
      <a href="../home.php" class="text-decoration-none">Back to Home</a>
    </div>

  </form>

</body>
</html>
