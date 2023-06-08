<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['pass']);
session_destroy();
echo "<script>window.location.href='../pages/loginUser.php';</script>";

?>