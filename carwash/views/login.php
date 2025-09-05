
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/client_login.css" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     <form action="../page/login_process.php" method="POST">
         <div class=" login-box">
            <img src ="../assets/logo.png" alt="Logo" class="login-img">

           <br/>
            <h4>Name:</h4>
            <div>
            <input type ="text" name="name" placeholder="Your Fullname">
             <h4>Password:</h4>
            <div>
            <input type="password" name="pass" placeholder="Your password">
              <br><br>
            <button type="submit" name="login">Login</button>
            
        </div>

        <div class="login">
    <p>Don't Have Account Yet? <a href="./index.php">Register</a></p>
  </div>
    </form>
</body>
</html>