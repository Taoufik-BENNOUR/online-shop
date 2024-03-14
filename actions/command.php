<?php
include "../utils/fetchUtils.php";
session_start();
if(!isset($_SESSION['isAuth'])){
    header("location:../login.php");
    return;
  }
$conn = connectToDatabase();
$date = Date("y-m-d");
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$cart_total=0;

$sql = "SELECT price,name FROM product WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(":id"=>$product_id));
$product = $stmt->fetch();

  
  if(!isset($_SESSION['basket'])){
    $_SESSION['basket'] = array($_SESSION['user_id'],$cart_total,$date,array());
  }
$cart_total = $quantity * $product['price'];
$_SESSION['basket'][1]+=$cart_total;
$_SESSION['basket'][3][] = array("quantity"=>$quantity,"total"=>$cart_total,"date"=>$date,"id"=>$product_id,"name"=>$product['name']);

header("location:./../basket.php");
?>