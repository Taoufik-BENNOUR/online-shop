<?php
require_once "pdo.php";
$stmt=$conn->query("SELECT * FROM category");
$categories = $stmt->fetchALL();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/navbar.css">
</head>
<body>
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
        <?php 
      if (isset($_SESSION['isAuth'])) {
        echo " <div class='profile'>
        <svg class='icon' width='32px' height='32px' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M5.16108 10.0731C4.45387 9.2649 5.02785 8 6.1018 8H17.898C18.972 8 19.5459 9.2649 18.8388 10.0731L13.3169 16.3838C12.6197 17.1806 11.3801 17.1806 10.6829 16.3838L5.16108 10.0731ZM6.65274 9.5L11.8118 15.396C11.9114 15.5099 12.0885 15.5099 12.1881 15.396L17.3471 9.5H6.65274Z' fill='white'></path> </g></svg>
         <div class='options'>
         <a href='profile.php'><span>Profile</span></a>
         <a href='logout.php'><span>Logout</span></a>
         </div>
        </div>";
      } else {
          echo "<a class='col-1' href='login.php'><button class='btn btn-outline-success'>Login<i class='bi bi-box-arrow-in-right'></i></button></a>";
      }
?>      </div>
    </div>
  </nav>
  
</body>
</html>
