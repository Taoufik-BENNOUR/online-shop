<?php
include "../utils/fetchUtils.php";

$categories = getCatgories();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" ></link>
    <title>Document</title>
</head>
<body>
    <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
        <div class="col">
            <h1 class="text-center bg-dark text-danger py-2">Categories</h1>
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                    <th><a href="" class="btn btn-primary">Add</a></th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ($categories as $key=> $category) {
            ?>
        <tr>
      <th scope="row"><?= $key; ?></th>
      <td><?= $category['name']; ?></td>
      <td><?= $category['description']; ?></td>
      <td>
         <a href="" class="btn btn-success">Edit</a>
         <a href="" class="btn btn-danger">Delete</a>
      </td>
      <td></td>
    </tr>
        <?php };?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>