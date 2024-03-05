<?php
include "../utils/fetchUtils.php";
session_start();

$categories = getCatgories();

if(isset($_POST['add'])&&isset($_POST['name'])){
    addCategory($_POST,$_SESSION['admin_id']);
    header("location:".$_SERVER['PHP_SELF']);
}
if(isset($_POST['edit'])&&isset($_POST['name'])){
    updateCategory($_POST);
    header("location:".$_SERVER['PHP_SELF']);
}

if(isset($_POST['delete_category'])&&isset($_POST['categoryId'])){
    deleteCatgory($_POST['categoryId']);
    header("location:".$_SERVER['PHP_SELF']);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <th scope="col">CreatedAt</th>
                    <th scope="col">Action</th>
                    <th><span class="btn btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</span></th>
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
      <td><?= $category['createdAt']; ?></td>      
       <td>
         <a href="" class="btn btn-success edit-btn" data-bs-toggle="modal" data-bs-target="#editModal"
         data-category-id="<?= $category['category_id']; ?>"
         data-category-name="<?= $category['name']; ?>"
         data-category-description="<?= $category['description']; ?>"
         >Edit</a>
         <div style="display: inline-block;">
        <form action="" method="post" style="margin: 0; padding: 0;">
            <input type="hidden" value="<?= $category['category_id']; ?>" name="categoryId" />
            <button class="btn btn-danger" type="submit" name="delete_category">Delete</button>
        </form>
    </div>
      </td>
      <td></td>
    </tr>
        <?php };?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Category name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="category name...">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" placeholder="category description..."></textarea>
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add">Save</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- Modify category Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Category name</label>
                <input name="name" type="text" class="form-control" id="editName" placeholder="category name...">
                <input name="categoryId" type="hidden" class="form-control" id="editId" placeholder="category name...">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="editDescription" placeholder="category description..."></textarea>
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="edit">Save</button>
        </div>
    </form>
    </div>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var categoryId = button.getAttribute('data-category-id');
                var categoryName = button.getAttribute('data-category-name');
                var categoryDescription = button.getAttribute('data-category-description');
                document.getElementById('editName').value = categoryName;
                document.getElementById('editId').value = categoryId;
                document.getElementById('editDescription').value = categoryDescription;
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>