<?php
require_once "pdo.php";
require_once "./utils/fetchUtils.php";

if(!empty($_POST)){
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
<body>
  <?php
  include "navbar.php";
  ?>
  <div class="row col-12 mt-5"  style="margin:0 15%;">
            <?php
        foreach($products as $product){
         echo '<div class="col-3">
          <div class="card" style="width: 18rem;">
              <img src="'.$product['image'].'" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">'.$product['name'].'</h5>
                <p class="card-text">'.$product['description'].'</p>
                <a href="#" class="btn btn-success">Go somewhere</a>
              </div>
            </div>
      </div>';
}
?>
  </div>
<div class="position-fixed fixed-bottom">
  <footer class="bg-dark text-center text-white">
  <div class="container p-4 pb-0">
    <section class="mb-4">
      <a class="btn btn-outline-success  btn-floating m-1" href="#!" role="button">
        <i class="bi bi-github"></i>
      </a>
      <a class="btn btn-outline-success  btn-floating m-1" href="#!" role="button">
        <i class="bi bi-globe"></i>
      </a>
      <a class="btn btn-outline-success btn-floating m-1" href="#!" role="button">
        <i class="bi bi-linkedin"></i>
      </a>
    </section>
  </div>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2024 Copyright:
    <a class="text-white" href="https://taoufikbennour.com/" target="_blank">T.PHP</a>
  </div>
</footer>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>