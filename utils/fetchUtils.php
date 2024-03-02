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
function getProductById($id){
    $conn = connectToDatabase();
    $sql = "SELECT * FROM product WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":id"=>$id));
    $product = $stmt->fetch();
    return $product;
}

function searchProduct($key){
    $conn = connectToDatabase();
    $sql = "SELECT * FROM product WHERE name LIKE :name";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":name"=>"%".$key."%"));
    $product = $stmt->fetchAll();

    return $product;
}

function register($data){
    $conn = connectToDatabase();
    $sql = "INSERT INTO visitor (firstname,lastname,email,password,phone) VALUES 
    (:firstname,:lastname,:email,:password,:phone)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":firstname"=>$data['firstname'],":lastname"=>$data['lastname'],
    ":email"=>$data['email'],":password"=>md5($data['password']),":phone"=>$data['phone'])); 
    return true;
}

function login($data){
    $conn = connectToDatabase();
    $sql = "SELECT * FROM visitor WHERE email=:email AND password=:password";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":email"=>$data['email'],":password"=>md5($data['password'])));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}
function getUsers(){
    $conn = connectToDatabase();
    $sql = "SELECT * FROM visitor";
    $stmt = $conn->query($sql);
    $users = $stmt->fetchAll();
    return $users;
}

//admin
function AdminLogin($data){
    $conn = connectToDatabase();
    $sql = "SELECT * FROM admin WHERE email=:email AND password=:password";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":email"=>$data['email'],":password"=>md5($data['password'])));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function getCatgories(){
    $conn = connectToDatabase();
    $sql = "SELECT * FROM categories";
    $stmt = $conn->query($sql);
    $categories = $stmt->fetchAll();
    return $categories;
}
?>