<?php
session_start();
$_SESSION['status'];
$_SESSION['success_status'];
$conn = new mysqli("localhost", "root", "", "sticky_notes");
?>