<?php
include "../utils/fetchUtils.php";
session_start();

$products = getAllProducts();
$categories = getCategories();

$target_dir = "uploads/";
$file =isset($_FILES["image"])? $_FILES["image"]:"";
$target_file = isset($_FILES["image"])? $target_dir . basename($_FILES["image"]["name"]):"";

$error=false;
if(isset($_POST['add_product'])&&isset($_POST['name'])){
 addProduct($_POST,$_SESSION['admin_id'],$file,$target_file);
    header("location:".$_SERVER['PHP_SELF']);
}
if(isset($_POST['edit-product'])){
    updateProduct($_POST);
    header("location:".$_SERVER['PHP_SELF']);
}

if(isset($_POST['delete_product'])&&isset($_POST['productId'])){
    deleteProduct($_POST['productId']);
    header("location:".$_SERVER['PHP_SELF']);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Products list</title>
</head>
<body>
<?php
  if($error){
    echo '<div class="position-fixed bottom-0 end-50 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Category name already exists</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
    <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
        <div class="col">
            <h1 class="text-center bg-dark text-danger py-2">Products</h1>
            <div class="d-flex px-5">
                <span class="btn btn-primary" style="margin-left:auto" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</span>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">CreatedAt</th>
                    <th scope="col">UpdatedAt</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ($products as $key=> $product) {
            ?>
        <tr>
      <th scope="row"><?= $key; ?></th>
      <td><?= $product['name']; ?></td>
      <td><?= $product['description']; ?></td>      
      <td><?= $product['price']; ?></td>      
      <td><?= $product['category']; ?></td>      
      <td><?= $product['createdAt']; ?></td>      
      <td><?= $product['updatedAt']; ?></td>      
       <td>
         <a href="" class="btn btn-success edit-btn" data-bs-toggle="modal" data-bs-target="#editModal"
         data-product-id="<?= $product['id']; ?>"
         data-product-name="<?= $product['name']; ?>"
         data-product-description="<?= $product['description']; ?>"
         data-product-price="<?= $product['price']; ?>"
         data-product-category="<?= $product['category']; ?>"
         >Edit</a>
         <div style="display: inline-block;">
        <form method="post" style="margin: 0; padding: 0;">
            <input type="hidden" value="<?= $product['id']; ?>" name="productId" />
            <button onclick="return confirmDeletion()" class="btn btn-danger" type="submit" name="delete_product">Delete</button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="name" class="form-label">Product name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="product name..." required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" placeholder="product description..." required></textarea>
            </div>            
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" type="number" class="form-control" id="price" placeholder="product price..." required>
            </div>   
            <div class="mb-3">
                <select class="form-select" name="category" id="category">
                    <?php
                    foreach($categories as $category){
                        ?>
                        <option><?= $category['name'] ;?></option>
                    <?php
                    };
                    ?>
                </select>
            </div>           
            <div class="mb-3">
                <input name="image" type="file" class="form-control" id="image">
            </div>                      
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add_product">Save</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- Modify category Modal or for loop -->
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
                <input name="product-name" type="text" class="form-control" id="product-name" placeholder="product name...">
                <input name="product-id" type="hidden" class="form-control" id="product-id">
                <p><?= $error; ?></p>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="product-description" class="form-control" id="product-description" placeholder="product description..."></textarea>
            </div>            
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="product-price" class="form-control" id="product-price" placeholder="product price..."></input>
            </div>  
            <div class="mb-3">
                <select class="form-select" name="product-category" id="product-category">
                    <?php
                    foreach($categories as $category){
                        ?>
                <option><?= $category['name']; ?></option>
                    <?php
                    };
                    ?>
                </select>
            </div>           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="edit-product">Save</button>
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
                var productId = button.getAttribute('data-product-id');
                var productName = button.getAttribute('data-product-name');
                var productDescription = button.getAttribute('data-product-description');
                var productPrice = button.getAttribute('data-product-price');
                var productCategory = button.getAttribute('data-product-category');
                document.getElementById('product-id').value = productId;
                document.getElementById('product-name').value = productName;
                document.getElementById('product-description').value = productDescription;
                document.getElementById('product-price').value = productPrice;
                document.getElementById('product-category').value = productCategory;
            });
        });
    });
    (function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
function confirmDeletion(){
    return confirm("Confirm deletion");
}
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>