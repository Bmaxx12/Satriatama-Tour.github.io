<?php
include("include/connect.php");
session_start();
$aid = $_SESSION['aid'];
$query = "DELETE FROM CART WHERE aid = $aid";

$result = mysqli_query($con, $query);
$_SESSION['aid'] = -1;

$_SESSION = array();

session_destroy();

header("Location: login.php");
?>