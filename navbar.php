<?php
require_once "pdo.php";

$stmt=$conn->query("SELECT * FROM category");
$categories = $stmt->fetchALL();
?>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">O-Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu">
              <?php
              foreach($categories as $row){
                echo '<li><a class="dropdown-item" href="">' .$row['name']. '</a></li>';
              }
              ?>
              
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
        <div class="d-sm-none d-md-block me-auto col-md-4 col-sm">
          <form class="d-flex" role="search" action="index.php" method="POST">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
           <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
          <a class="col-1" href="login.php"><button class="btn btn-outline-success">Login<i class="bi bi-box-arrow-in-right"></i></button></a>
      </div>
    </div>
  </nav>