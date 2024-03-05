<?php
require_once "pdo.php";
require_once "./utils/fetchUtils.php";
session_start();
if(isset($_GET['productId'])){
    $product = getProductById($_GET['productId']);
    if($product==false){
         "product doesnt exist";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O-Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
  include "navbar.php";
  ?>
  <div class="card col-8 m-auto">
  <img class="card-img-top" src="<?= $product['image']; ?>" style="height:200px;object-fit: cover;" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $product['name']; ?></h5>
    <p class="card-text"><?= $product['description']; ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Price : <?= $product['price']; ?></li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div>
<?php
  include "footer.php";

?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
