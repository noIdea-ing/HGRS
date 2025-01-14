<?php
include 'notification.php';
session_start();
session_unset(); // Unset all session values
session_destroy(); // Destroy the session
header('Location: index.php'); // Redirect to login page
exit();
?>