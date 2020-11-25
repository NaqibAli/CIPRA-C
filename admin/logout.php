<?php

session_start();
session_destroy();
$_SESSION['isloged'] = 0;

header("Location:./login.php");

// $f= random_int(10000,99999);

// echo $_SESSION['userid'];

// // echo $f;

?>