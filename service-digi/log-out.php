<?php
session_start();
unset($_SESSION['emailAdress']);
header("location:log-in.php");
?>