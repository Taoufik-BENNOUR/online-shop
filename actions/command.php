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


$sql = "SELECT price,name FROM product WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(":id"=>$product_id));
$product = $stmt->fetch();
$total = $quantity * $product['price'];

// $sql_basket = "INSERT INTO basket (user_id,total,createdAt)
//      VALUES(:user_id,:total,:createdAt)";
// $stmt = $conn->prepare($sql_basket);
// $stmt->execute(array(
//       ":user_id"=>$_SESSION['user_id'],
//       ":total"=>$total,
//       ":createdAt"=>$date
//     ));
 
if(!isset($_SESSION['basket'])){
  $_SESSION['basket'] = array($_SESSION['user_id'],0,$date,array());
}
$_SESSION['basket'][1]+=$total;
$_SESSION['basket'][3][] = array("quantity"=>$quantity,"total"=>$total,"date"=>$date,"id"=>$product_id,"name"=>$product['name']);

// $basket_id=$conn->lastInsertId();


// $sql_command = "INSERT INTO commands (product_id,basket_id,quantity,total,createdAt)
// VALUES (:product_id,:basket_id,:quantity,:total,:createdAt)";
// $stmt2 = $conn->prepare($sql_command);
// $stmt2->execute(array(
//     ":product_id"=>$product_id,
//     ":basket_id "=>$basket_id,
//     ":quantity"=>$quantity,
//     ":total"=>$total,
//     ":createdAt"=>$date))
//     ;

header("location:./../basket.php");
?>