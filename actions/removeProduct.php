<?php
session_start();
$id = $_GET['id'];
$removed_amount = $_SESSION['basket'][3][$id]['total'];
$_SESSION['basket'][1]-=$removed_amount;
unset($_SESSION['basket'][3][$id]);
header("location:./../basket.php")
?>