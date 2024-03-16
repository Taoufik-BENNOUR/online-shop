<?php 
include "../utils/fetchUtils.php";
session_start();

$conn = connectToDatabase();
$date = Date("y-m-d");

$total = $_SESSION['basket'][1];
$sql_basket = "INSERT INTO basket (user_id,total,createdAt)
     VALUES(:user_id,:total,:createdAt)";
$stmt = $conn->prepare($sql_basket);
$stmt->execute(array(
        ":user_id"=>$_SESSION['user_id'],
        ":total"=>$total,
        ":createdAt"=>$date
      ));

$basket_id=$conn->lastInsertId();

$items = $_SESSION['basket'][3];

foreach ($items as $item) {
    $sql_command = "INSERT INTO orders (product_id,basket_id,quantity,total,createdAt)
VALUES (:product_id,:basket_id,:quantity,:total,:createdAt)";
$stmt2 = $conn->prepare($sql_command);
$stmt2->execute(array(
    ":product_id"=>$item['id'],
    ":basket_id"=>$basket_id,
    ":quantity"=>$item['quantity'],
    ":total"=>$item['total'],
    ":createdAt"=>$date));
}
$_SESSION['basket'] = null;
header("location:./../index.php");
?>