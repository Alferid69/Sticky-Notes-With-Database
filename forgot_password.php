<?php
include("connection.php");
$_SESSION['success_status'] = "";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="forgot_password.css">
    <title>Forgot Password</title>
  </head>
  <body>
    <div class="forgot-password-container">
      <div class="forgot-password-header">
        <h2>Forgot Password</h2>
      </div>
      <div class="forgot-password-form">
        <form action="password_recovery.php" method="post">
          <div class="form-group">
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <input
            type="submit"
            class="btn-submit"
            name="recover_password"
            value="Recover Password"
          />
        </form>
        <h4 style="color: red;">
          <?php
            if(isset($_SESSION['status'])){
              echo $_SESSION['status'];
            }
          ?>
        </h4>
        <div class="signup-link">
          Remember your password?
          <a href="index.php" style="font-weight: bold">Log in here</a>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
$_SESSION['status'] = "";
?>