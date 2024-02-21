<?php
$user = "admin";
$password= "admin";
$dbname="oshop";
try {
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    // echo "Conenction failed: ". $e->getMessage();
}

?>