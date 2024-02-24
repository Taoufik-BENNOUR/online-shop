<?php
require_once "./utils/fetchUtils.php";

if(isset($_GET['productId'])){
    $product = getProductById($_GET['productId']);
    if($product==false){
        alert "product doesnt exist";
    }
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="card col-8">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $product['name']; ?></h5>
    <p class="card-text"><?= $product['description']; ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div>
</body>
</html>