<?php
// Including the connection file to establish a connection to the database
include("connection.php");

// Generating a random confirmation number
$confirmationNumber = rand(100000, 999999);
// Storing the confirmation number and email in session variables
$_SESSION['confirmation'] = $confirmationNumber;
$_SESSION['email'] = $_POST['email'];

// Query to check if a user with the provided email exists
$query = "SELECT * FROM user_credential WHERE email = '{$_POST['email']}';";
$result = $conn->query($query);

// If no user is found with the provided email, redirect back to forgot_password.php
if ($result->num_rows == 0) {
    $_SESSION['status'] = "No User Was Found With This Email Address";
    header("Location: forgot_password.php");
}

// Including PHPMailer classes for sending emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// If the recover password form is submitted, send an email with the confirmation number
if (isset($_POST['recover_password'])) {
    // Creating a new PHPMailer instance
    $mail = new PHPMailer(true);

    // Configuring SMTP settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'alfeman4@gmail.com';                   // SMTP username
    $mail->Password   = 'dgja vjcl cpyc utfn';                  // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable implicit TLS encryption
    $mail->Port       = 465;                                    // TCP port to connect to

    // Set email properties
    $mail->setFrom('alfeman4@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Password Recovery';
    $mail->Body    = $confirmationNumber;

    // Send the email
    $mail->send();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="password_recovery.css">
    <title>Password Recovery</title>
  </head>
  <body>
    <div class="forgot-password-container">
      <div class="forgot-password-header">
        <h2>Enter Recovery Password</h2>
      </div>
      <div class="forgot-password-form">
        <form action="password_recovery_checker.php" method="post">
          <div class="form-group">
            <input type="number" name="recovery_password" placeholder="Enter Password xxx xxx" required />
          </div>
          <input
            type="submit"
            class="btn-submit"
            name="recover_password"
            value="Recover Password"
          />
        </form>
      </div>
    </div>
  </body>
</html>