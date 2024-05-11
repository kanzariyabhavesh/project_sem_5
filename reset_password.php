<?php
session_start();
include 'database.php'; // Include your database connection file

$email = $_GET['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST['new_password'];
    
    // Update the user's password in the database
    $hashedPassword = md5($newPassword); // Hash the password before storing it
    $query = "UPDATE registration SET password = '$hashedPassword' WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        // Password reset successful
        header("Location:index.php");
        exit();
    } else {
        // Handle database error
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class = 'wrapper'>
        <div class = 'title'>
          Reset Password
        </div>
    <form action="" method="post">
        <div class="field">
            <input type="password" id="new_password" name="new_password" required>
            <label for="new_password">New Password:</label>
        </div>
        <div class="field">
        <button type="submit">Reset Password</button>
        </div>
    </form>
</div>
</body>
</html>
