<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the home page or any other page after logout
header("Location: index.php"); // Change the URL as needed
exit();

include("index.php");
?>
