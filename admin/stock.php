<?php
require "../utils/fetchUtils.php";
$stocks = getStock();
if(isset($_POST['edit_stock'])&&isset($_POST['stock_quantity'])){
    updateStock($_POST);
    header("location:".$_SERVER['PHP_SELF']);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Stock</title>
</head>
<body>
    <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
        <div class="col">
            <h1 class="text-center bg-dark text-danger py-2">Stock</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Creator</th>
                    <th scope="col">CreatedAt</th>
                    <th scope="col">UpdatedAt</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ($stocks as $key=> $stock) {
            ?>
        <tr>
      <th scope="row"><?= $key; ?></th>
      <td><?= $stock['name']; ?></td>
      <td><?= $stock['quantity']; ?></td>      
      <td><?= $stock['creator']; ?></td>      
      <td><?= $stock['stockCreatedAt']; ?></td>      
      <td><?= $stock['stockUpdatedAt']; ?></td>      
      <td>
      <a href="" class="btn btn-success edit-btn" data-bs-toggle="modal" data-bs-target="#editModal"
         data-stock-id="<?= $stock['stock_id']; ?>"
         data-stock-quantity="<?= $stock['quantity']; ?>"
         >Edit</a>
      </td>
      <td></td>
    </tr>
        <?php };?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Stock</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">         
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Quantity</label>
                <input type="number" name="stock_quantity" class="form-control" id="stock_quantity" placeholder="product price..."></input>
                <input type="hidden" name="stock_id"  class="form-control" id="stock_id">
            </div>           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="edit_stock">Save</button>
        </div>  
    </form>
    </div>
  </div>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var stockId = button.getAttribute('data-stock-id');
                var stockQuantity = button.getAttribute('data-stock-quantity');
                document.getElementById('stock_id').value = stockId;
                document.getElementById('stock_quantity').value = stockQuantity;
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>