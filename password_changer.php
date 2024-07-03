<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="password_changer.css">
    <title>Password Changer</title>
  </head>
  <body>
    <div class="forgot-password-container">
      <div class="forgot-password-header">
        <h2>Create New Password</h2>
      </div>
      <div class="forgot-password-form">
        <form action="password_changer.php" method="post">
          <div class="form-group">
            <input type="password" name="password" placeholder="Enter New Password" required />
          </div>
          <input
            type="submit"
            class="btn-submit"
            name="new_password"
            value="Change Password"
          />
        </form>
      </div>
    </div>
  </body>
</html>
<?php
  include("connection.php");

  if(isset($_POST['new_password'])){
    if(isset($_POST['password'])){
      $password = $_POST['password'];
      $query = "UPDATE user_credential
      SET password = '$password'
      WHERE email = '{$_SESSION['email']}';
      ";
      if($conn->query($query) == true){
        header("Location: index.php");
      }
    }
  }
?>