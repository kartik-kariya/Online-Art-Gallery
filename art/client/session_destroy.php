<?php
session_start();
ob_start();

unset($_SESSION['signin_username']);
unset($_SESSION['signin_user']);
session_destroy();
header("Location: signin.php");

ob_flush();
?>