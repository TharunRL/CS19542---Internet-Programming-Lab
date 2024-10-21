<?php
session_start(); // Start the session

// Destroy the session to log the user out
session_destroy(); // Destroy all session variables
header("Location: login.html"); // Redirect to the login page
exit(); // Stop further script execution
?>
