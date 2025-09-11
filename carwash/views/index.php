
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title> 
    <link rel="stylesheet" href="../assets/css/client_login.css" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
   
</head>
<body>
     <form action="../page/register_process.php" method="POST">
         <div class=" login-box">
            <img src ="../assets/logo.png" alt="Logo" class="login-img">

           <br/>
              <h4>Name:</h4>
              <div>
               <input type ="text" name="name" placeholder="Your Fullname">
              </div>
  
               <h4>Email:</h4>
              <div>
              <input type ="text" name="email" placeholder="Your Email">
              </div>
  
               <h4>Contact number:</h4>
              <div>
              <input type ="text" name="contact" placeholder="Your Contact number">
              </div>

             <h4>Password:</h4>
<div class="input-wrapper">
  <input type="password" name="pass" placeholder="Your password" id="password">
  <i class="fa fa-eye toggle-icon" id="togglePassword"></i>
</div>
 <br><br>

              <button type="submit" name="register">Register</button>
              
          </div>

        <div class="login">
          <p>Already Have An Account? <a href="./login.php">Login</a></p>
        </div>
    </form>
<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function () {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // toggle the eye / eye-slash icon
    this.classList.toggle('fa-eye-slash');
  });
</script>

</body>
</html>