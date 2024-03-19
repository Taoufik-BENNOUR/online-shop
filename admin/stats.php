<?php 
include "../utils/fetchUtils.php";

$data = getData();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Stats</title>
</head>
<body>
    <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
        <div class="col">
            <h1 class="text-center bg-dark text-danger py-2">Stock</h1>
            <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <h2 class="mb-5">Stats Card</h2>
        <div class="header-body">
          <div class="row">
            <?php
            foreach ($data as $count) {
                ?>
            <div class="col-xl-3 col-lg-6 mb-2">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><?= $count['name'] ;?></h5>
                      <span class="h2 font-weight-bold mb-0"><?= $count['count'] ;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="text-white ">
                        <i class="bi bi-cart bg-danger rounded-circle p-2"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <?php };?>
          </div>
        </div>
      </div>
    </div>
        </div>
</body>