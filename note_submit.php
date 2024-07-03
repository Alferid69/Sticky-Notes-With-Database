<?php
include("connection.php");
$username = $_SESSION['username'];

$written_note = $_POST['input_note'];
$trimmed_note = trim($written_note); // Remove leading and trailing whitespace

// Check if the trimmed note is not empty
if (!empty($trimmed_note)) {
    try{
      $query = "INSERT INTO notes (username_n, Note) VALUES ('$username', '$trimmed_note');";
      if ($conn->query($query) == TRUE) {
        // echo "added successfully";
        header("Location: home.php");
      }
    }catch(mysqli_sql_exception){
      echo "couldn't add note please try again later.";
    }
    
} else {
    // Handle case where the note is empty
    header("Location: home.php");
}
