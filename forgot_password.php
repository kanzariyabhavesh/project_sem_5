<?php
session_start();
include 'database.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    // Generate OTP
    $otp = generateOTP(); // You need to define this function
    
    // Store OTP in the database
    $query = "UPDATE registration SET otp = '$otp' WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        // Send OTP to the user's email
        $to = $email;
        $subject = "Password Reset OTP";
        $message = "Your OTP for password reset is: $otp";
        $headers = "From:bhaveshit6340@gmail.com"; // Replace with your email
        
        // Send the email
        mail($to, $subject, $message, $headers);
        
        // Redirect the user to OTP verification page
        header("Location: verify_otp.php?email=$email");
        exit();
    } else {
        // Handle database error
        echo "Error: " . mysqli_error($conn);
    }
}

function generateOTP() {
    // Generate a random 6-digit OTP
    return mt_rand(100000, 999999);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
      <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="wrapper">
         <div class="title">
    Forgot Password 
         </div>
    <form action="" method="post">
        <div class="field">
        <input type="email" id="email" name="email" required>
        <label for="email">Email Address:</label>
        </div>
        <div class="field">
        <button type="submit">Reset Password</button>
    </div>
    </form>
</div>
</body>
</html>
