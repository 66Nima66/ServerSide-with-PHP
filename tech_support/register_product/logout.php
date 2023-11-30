<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['email'])) {
    session_unset();
    session_destroy();
}
// Redirect to the login
header("Location: login.php");
exit();
?>