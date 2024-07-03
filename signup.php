<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign_up.css">
    <title>Sign Up Page</title>
</head>
<body>
    <div class="signup-container">
        <div class="signup-header">
            <h2>Create an Account</h2>
        </div>
    <div class="signup-form">
        <form action="register.php" method="post">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" minlength="6" required>
            </div>
            <button type="submit" class="btn-signup">Sign Up</button>
        </form>
        <h5 style="color: red;">
                <?php if(isset($_SESSION['status'])){
                    echo $_SESSION['status'];
                }
                ?>
        </h5>
        <h5 style="color: green;">
            <?php if(isset($_SESSION['status'])){
                    echo $_SESSION['success_status'];
                }
                ?>
            
        </h5>
        <div class="signin-link">
            Already have an account? <a href="index.php" style="font-weight: bold;">Sign in here</a>
        </div>
    </div>
</div>
</body>
</html>
<?php
$_SESSION['success_status']="";
$_SESSION['status'] = "";
?>