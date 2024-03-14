<?php
require_once "pdo.php";
require_once "./utils/fetchUtils.php";
session_start();
if(!empty($_POST['search'])){
  $products = searchProduct($_POST['search']);
}else{
  $products = getAllProducts();
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
<body class="d-flex flex-column" style="min-height: 100vh;">
  <?php
  include "navbar.php";
  ?>
  <div class="d-flex flex-wrap align-items-center col-10 m-auto">
            <?php
        foreach($products as $product){
         echo '
          <div class="card m-3" style="width: 18rem;height: 100%">
              <img src="admin/uploads/'.$product['image'].'" class="card-img-top" height="150" alt="...">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">'.$product['name'].'</h5>
                <p class="card-text 4">'.$product['description'].'</p>
                <a href="product.php?productId='.$product['id'].'" class="btn btn-success align-self-start mt-auto">Go somewhere</a>
              </div>
            </div>';
}
?>
  </div>
  <?php
  include "footer.php";
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>