<?php
// Including the connection file to establish a connection to the database
include("connection.php");

// Retrieving user input data from the signup form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Checking if the provided email is already in use
$query = "SELECT * FROM user_credential where email = '$email'";
if ($conn->query($query)->num_rows > 0) {
    $_SESSION['status'] = "Email is already in use";
    header("Location: signup.php");
}

// Checking if the provided username is already in use
$query = "SELECT * FROM user_credential where username = '$username'";
if ($conn->query($query)->num_rows > 0) {
    $_SESSION['status'] = "Username is already in use";
    header("Location: signup.php");
}

// Checking if both email and username are already in use
$query = "SELECT * FROM user_credential where username = '$username' AND email = '$email'";
if ($conn->query($query)->num_rows > 0) {
    $_SESSION['status'] = "Email and Username is already in use";
    header("Location: signup.php");
}

// Inserting the new user data into the database if no conflicts are found
$query = "INSERT INTO user_credential(email, username,password)VALUES('$email', '$username', '$password')";

if ($conn->query($query) == TRUE) {
    $_SESSION['success_status'] = "You have registered successfully. Please Signin to continue.";
    header("Location: signup.php");
}
?>
