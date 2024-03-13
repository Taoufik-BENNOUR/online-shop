<?php
include "../utils/fetchUtils.php";
session_start();
if(!isset($_SESSION['isAuth'])){
    header("location:../login.php");
    return;
  }
$conn = connectToDatabase();
$sql = "SELECT price FROM product WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(":id"=>$_POST['product_id']));
$product = $stmt->fetch();
$total = $_POST['quantity'] * $product['price'];

$date = Date("y-m-d");
$sql2 = "INSERT INTO commands (product_id,quantity,total,createdAt)
VALUES (:product_id,:quantity,:total,:createdAt)";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute(array(
    ":product_id"=>$_POST['product_id'],
    ":quantity"=>$_POST['quantity'],
    ":total"=>$total,
    ":createdAt"=>$date))
    ;
?>