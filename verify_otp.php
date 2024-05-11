<?php
session_start();
include 'database.php';
// Include your database connection file

$email = $_GET[ 'email' ];
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $enteredOTP = $_POST[ 'otp' ];

    // Retrieve OTP from the database
    $query = "SELECT otp FROM registration WHERE email = '$email'";
    $result = mysqli_query( $conn, $query );
    $row = mysqli_fetch_assoc( $result );
    $storedOTP = $row[ 'otp' ];

    if ( $enteredOTP == $storedOTP ) {
        // OTP verification successful, allow the user to reset password
        header( "Location: reset_password.php?email=$email" );
        exit();
    } else {
        // Invalid OTP
        echo 'Invalid OTP. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Verify OTP</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class = 'wrapper'>
        <div class = 'title'>
            Verify OTP
        </div>
        <form action = '' method = 'post'>
            <div class="field">
                <input type = 'text' id = 'otp' name = 'otp' required>
                <label for = 'otp'>Enter OTP:</label>
            </div>
            <div class="field">
                <button type = 'submit'>Verify OTP</button>
            </div>
        </form>
</div>
</body>
</html>
