<?php
include("connection.php");

$username = $_GET['username'];
$note_id = $_GET['note_id'];

// Execute the deletion query
$query = "DELETE FROM notes WHERE username_n = '$username' AND id = '$note_id'";
$result = $conn->query($query);

// Check if deletion was successful and return appropriate response
if ($result) {
  header('Location: home.php');
  exit(); // Stop further execution
} else {
  header('Location: home.php');
}?>