<?php
// Include the connection file to establish a connection to the database
include("connection.php");

// Retrieve username and password from the session
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// SQL query to select user information based on the username
$query = "SELECT * FROM user_credential WHERE username = '$username';";

// Execute the query
$result = $conn->query($query);

// Check if there is at least one row returned from the query
if ($result->num_rows > 0) {
    // Fetch the first row from the result set
    $row = $result->fetch_assoc();
    // Check if the password retrieved from the database matches the session password
    if ($row['password'] == $password) {
        // If passwords match, set session status to empty and redirect to home.php
        $_SESSION['status'] = "";
        header("Location: home.php");
    } else {
        // If passwords do not match, set session status to indicate wrong password and redirect to index.php
        $_SESSION['status'] = "WRONG PASSWORD TRY AGAIN";
        header("Location: index.php");
    }
} else {
    // If no rows are returned, set session status to indicate user not found and redirect to index.php
    $_SESSION['status'] = "USER NOT FOUND PLEASE SIGNUP";
    header("Location: index.php");
}
?>
