<?php
function connectToDatabase() {
    $user = "admin";
    $password = "admin";
    $dbname = "oshop";
    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // Handle connection error here
        // You can log the error or return false
        return false;
    }
}


function getAllProducts(){
$conn = connectToDatabase();
$sql = "SELECT * FROM product";
$stmt = $conn->query($sql);
$products = $stmt->fetchAll();

return $products;
}
?>