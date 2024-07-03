<?php
  include("connection.php");
  
  if(isset($_POST['recover_password'])){
    $password = $_POST['recovery_password'];
    if($password  == $_SESSION['confirmation']){
      header("Location: password_changer.php");
    }
    else{
      $_SESSION['status'] = "Wrong Verification Password Try Again";
      header("Location: forgot_password.php");
  }
}
?>