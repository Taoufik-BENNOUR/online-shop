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
    $creationDate=Date("y-m-d");
    $sql = "INSERT INTO visitor (firstname,lastname,email,password,phone,createdAt) VALUES 
    (:firstname,:lastname,:email,:password,:phone,:createdAt)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
    ":firstname"=>$data['firstname'],
    ":lastname"=>$data['lastname'],
    ":email"=>$data['email'],
    ":password"=>md5($data['password']),
    ":phone"=>$data['phone'],
    ":createdAt"=>$creationDate)); 
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
    $sql = "SELECT * FROM visitor ORDER BY state ASC";
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

function getCategories(){
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
function addProduct($product,$creatorId,$file,$target_file){
    $conn = connectToDatabase();
    $date = date("y-m-d");

    if(uploadImage($file,$target_file)){
        $sql = "INSERT INTO product (name,description,price,category,image,creator,createdAt) VALUES (:name,:description,:price,:category,:image,:creator,:createdAt)";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array(":name"=>$product['name'],
            "description"=>$product['description'],
            "price"=>$product['price'],
            "category"=>$product['category'],
            "image"=>$file["name"],
            "creator"=>$creatorId,
            "createdAt"=>$date)); 
            return true;
    }else{
        return false;
    }


}
function uploadImage($file,$target_file){
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename($file['name'])). " has been uploaded.";
        return true;
      } else {
        echo "Sorry, there was an error uploading your file.";
        return false;
      }
}

function deleteProduct($productId){
    $conn = connectToDatabase();
    $sql = "DELETE FROM product WHERE id=:product_id";
    $stmt=$conn->prepare($sql);
    $stmt->execute(array(":product_id"=>$productId));
}

function updateProduct($product){
    $conn = connectToDatabase();
    $updateDate = date("y-m-d");
    $sql = "UPDATE product SET name=:name,description=:description,price=:price,category=:category,updatedAt=:updatedAt WHERE id=:product_id";
    $stmt=$conn->prepare($sql);
    $stmt->execute(array(
        ":product_id"=>$product['product-id'],
        ":name"=>$product['product-name'],
        "description"=>$product['product-description'],
        "price"=>$product['product-price'],
        "category"=>$product['product-category'],
        "updatedAt"=>$updateDate)); 
}

function validateUser($userId){
    $conn=connectToDatabase();
    $updateDate = date("y-m-d");
    $sql = "UPDATE visitor SET state=:state,updatedAt=:updatedAt WHERE visitor_id=:visitor_id";
    $stmt=$conn->prepare($sql);
    $stmt->execute(array(
        ":visitor_id"=>$userId,
        ":state"=>1,
        ":updatedAt"=>$updateDate
    ));
}
?>