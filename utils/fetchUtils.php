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

function addCategory($category,$creatorId){
    $conn = connectToDatabase();
    $date = date("y-m-d");
    $sql = "INSERT INTO categories (name,description,creator,createdAt) VALUES (:name,:description,:creator,:createdAt)";
    $stmt=$conn->prepare($sql);
    $stmt->execute(array(":name"=>$category['name'],"description"=>$category['description'],"creator"=>$creatorId,"createdAt"=>$date));
}

function deleteCatgory($categoryId){
    $conn = connectToDatabase();
    $sql = "DELETE FROM categories WHERE category_id=:category_id";
    $stmt=$conn->prepare($sql);
    $stmt->execute(array(":category_id"=>$categoryId));
}
function updateCategory($category){
    $conn = connectToDatabase();
    $updateDate = date("y-m-d");
    $sql = "UPDATE categories SET name=:name,description=:description,updatedAt=:updatedAt WHERE category_id=:category_id";
    $stmt=$conn->prepare($sql);
    $stmt->execute(array(":category_id"=>$category['categoryId'],":name"=>$category['name'],":description"=>$category['description'],":updatedAt"=>$updateDate));
}
?>