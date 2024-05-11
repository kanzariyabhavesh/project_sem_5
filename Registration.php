<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form Design | CodeLab</title>
      <link rel="stylesheet" href="css/styles.css">
      <style>
         .err{
            color:red;
         }
      </style>
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
           Registration  Form
         </div>
         <form action="login/Registration_insert.php" method="post">
         <div class="field">
               <input type="text" name="name" value="<?php echo isset($_GET['oldname'])?$_GET['oldname']:"";?>">
               <label>name</label>
            </div>
            <span class="err">
           <?php echo $nameErr ;?>
            </span>
            <div class="field">
               <input type="text" name="email" value="<?php echo isset($_GET['oldemail'])?$_GET['oldemail']:"";?>" >
               <label>Email Address</label>
            </div>
            <span class="err">
            <?php echo $emailErr ;?>
           </span>
            <div class="field">
               <input type="number" name="Mobil" value="<?php echo isset($_GET['oldMobil'])?$_GET['oldMobil']:"";?>">
               <label>Mobile Number</label>
            </div>
            <span class="err">
            <?php echo $MobilErr ;?>
           </span>
            <div class="field">
               <input type="password" name="password" value="<?php echo isset($_GET['password'])?$_GET['password']:"";?>">
               <label>Password</label>
            </div>
            <span class="err">
            <?php echo $passwordErr ;?>
           </span>
            
            <div class="field">
               <input type="submit" value="Registration">
            </div>
            <div class="signup-link">
               Not a member? <a href="index.php">login now</a>
            </div>
         </form>
      </div>
   </body>
</html>