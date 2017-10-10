<?php
session_start();
include 'config.php';

$role_id  = $_SESSION['placement_role_id'];
$username = $_SESSION['placement_username'];

session_destroy();

mysql_query("delete from select2 where username='$username'");

header("location: login.php");


?>