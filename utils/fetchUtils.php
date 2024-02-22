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

function searchProduct($key){
    $conn = connectToDatabase();
    $sql = "SELECT * FROM product WHERE name LIKE :name";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":name"=>"%".$key."%"));
    $product = $stmt->fetchAll();

    return $product;
}

function addVisitor($data){
    $conn = connectToDatabase();
    $sql = "INSERT INTO visitor (firstname,lastname,email,password,phone) VALUES 
    (:firstname,:lastname,:email,:password,:phone)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":firstname"=>$data['firstname'],":lastname"=>$data['lastname'],
    ":email"=>$data['email'],":password"=>$data['password'],":phone"=>$data['phone']));

    
}

?>