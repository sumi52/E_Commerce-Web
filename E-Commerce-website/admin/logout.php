<?php
session_start();
// Delete admin login session for logout purposes
unset($_SESSION['admin_name']);
unset($_SESSION['admin_email']);
header('Location: ../index.php');
?>