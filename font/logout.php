<?php
require ('includes/config.inc.php');
// Destroy the session:
$_SESSION = array(); // Destroy the variables.
session_destroy(); // Destroy the session itself.
setcookie (session_name(), '', time()-300); // Destroy the cookie.
$destination = 'login.php?logout=1';
$url = BASE_URL.$destination; // Define the URL.
header("Location: $url");
?>