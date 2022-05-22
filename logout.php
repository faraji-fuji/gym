<?php
session_destroy();
unset($_POST['email_addr']);
unset($_POST['password']);
header('location:header.php');
?>