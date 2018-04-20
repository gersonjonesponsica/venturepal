<?php
session_start();

unset($_SESSION['token']);
unset($_SESSION['userData']);
unset($_SESSION['isLogin']);

session_destroy();

//Redirect to homepage
header("Location:index");
?>