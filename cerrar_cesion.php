<?php
session_start();
session_unset();
session_destroy();
unset($_COOKIE["id"]);
setcookie("id",null,time()-3600);
header("Location: login.php");
?>