<?php
include "../utils/fetchUtils.php";
session_start();
if(!isset($_SESSION['isAuth'])){
    header("location:../login.php");
    return;
  }
$conn = connectToDatabase();
$date = Date("y-m-d");



$sql = "SELECT price FROM product WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(":id"=>$_POST['product_id']));
$product = $stmt->fetch();
$total = $_POST['quantity'] * $product['price'];

$sql_basket = "INSERT INTO basket (user_id,total,createdAt)
     VALUES(:user_id,:total,:createdAt)";
$stmt = $conn->prepare($sql_basket);
$stmt->execute(array(
      ":user_id"=>$_SESSION['user_id'],
      ":total"=>$total,
      ":createdAt"=>$date
    ));
$basket_id=$conn->lastInsertId();
$sql_command = "INSERT INTO commands (product_id,basket_id,quantity,total,createdAt)
VALUES (:product_id,:basket_id,:quantity,:total,:createdAt)";
$stmt2 = $conn->prepare($sql_command);
$stmt2->execute(array(
    ":product_id"=>$_POST['product_id'],
    ":basket_id "=>$basket_id,
    ":quantity"=>$_POST['quantity'],
    ":total"=>$total,
    ":createdAt"=>$date))
    ;


?>