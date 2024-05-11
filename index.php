<?php 
session_start(); 
if (isset($_SESSION['email'])) {
   header("Location:sizabar.php");
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <style>
         .err{
            color:red;
         }
      </style>
      <meta charset="utf-8">
      <title>Login Form Design | CodeLab</title>
      <link rel="stylesheet" href="css/styles.css">
   </head>
   <body>
   <?php
  $nameErr = "";
  $emailErr = "";
  $MobilErr = "";
  $passwordErr = "";
  if (isset($_GET['nameErr']))
  {
    $nameErr = $_GET['nameErr'];
  }
  if (isset($_GET['emailErr'])) {
    $emailErr = $_GET['emailErr'];
  }
  if (isset($_GET['MobilErr'])) {
    $MobilErr = $_GET['MobilErr'];
  }
  if (isset($_GET['passwordErr'])) {
    $passwordErr = $_GET['passwordErr'];
  }
 
  ?>
      <div class="wrapper">
         <div class="title">
           Login  Form
         </div>
         <form action="login/login_check.php" method="post">
            <div class="field">
               <input type="text" name="email" value="<?php echo isset($_GET['oldemail'])?$_GET['oldemail']:"";?>" >
               <label>Email Address</label>
            </div>
            <span class="err">
            <?php echo $emailErr ;?>
           </span>
            <div class="field">
               <input type="password" name="password" id="password" value="<?php echo isset($_GET['password'])?$_GET['password']:"";?>" >
               <label>Password</label>
            </div>
            <span class="err">
            <?php echo $passwordErr ;?>
           </span>
            <div class="content">
               <div class="pass-link">
                  <a href="#" style="margin-right: 177px;" onclick="togglePassword()">Check password</a>
               </div>
            </div>
               <div class="pass-link">
                  <a href="forgot_password.php"  style="margin-left: 177px;">Forgot password?</a>
               </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="Registration.php">Registration now</a>
            </div>
         </form>
         
      </div>
      <script>
      function togglePassword() {
          var passwordField = document.getElementById("password");
          if (passwordField.type === "password") {
              passwordField.type = "text";
          } else {
              passwordField.type = "password";
          }
      }
      </script>
   </body>
</html>
