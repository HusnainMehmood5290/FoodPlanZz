<?php
session_start();
// session_destroy();
unset($_SESSION["customer"]);
unset($_SESSION["cartCount"]);
unset($_SESSION['LoginSatus1']);
unset($_SESSION['LoginStatus2']);
header("location:index.php");
?>