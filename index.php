<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Login Page</title>
    <style>
        
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Welcome Back!</h2>
        </div>
        <div class="login-form">
            <form action="index.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" minlength="6" required>
                </div>
                <input type="submit" class="btn-submit" name="login" value="Login">
            </form>
            <h5 style="color: red;">
                <?php if(isset($_SESSION['status'])){// shows the reason for the failure of login
                    echo $_SESSION['status'];
                }
                ?>
            </h5>
            <div class="forgot-password-link">
                <a href="forgot_password.php" style="font-weight: bold; color: #6c5ce7;">Forgot Password?</a>
            </div>
            <div class="signup-link">
                Don't have an account? <a href="signup.php" style="font-weight: bold;">Sign up here</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$_SESSION['status'] = "";
$_SESSION['success_status'] = "";
if(isset($_POST['login'])){
    if(isset($_POST['username']) && isset($_POST['password'])){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header("Location: login.php");
    }
}
?>