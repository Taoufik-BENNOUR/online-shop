<?php
require "../utils/fetchUtils.php";
$baskets = getAllBaskets();
$orderDetails = getOrderDetail();

function statusClass($status){
  if($status=="In progress") return "bg-warning";
  if($status=="Delivered") return "bg-success";
  if($status=="Canceled") return "bg-danger";
}
if(isset($_POST['edit-status']) && isset($_POST['basket_id'])){
  updateBasketStatus($_POST);
  header("location:".$_SERVER['PHP_SELF']);
}
if(isset($_POST['status'])){
  if($_POST['status'] == "All"){
    $baskets = getAllBaskets();
  }else{
    $baskets = getBasketByStatus($baskets,$_POST['status']);
  }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>commands</title>
</head>
<body>
    <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
        <div class="col">
            <h1 class="text-center bg-dark text-danger py-2">ORDERS</h1>
        <form action="" method="POST" class="mx-2"> 
          <input class="btn btn-dark" type="submit" name="status" value="All"/>
          <input class="btn btn-success" type="submit" name="status" value="Delivered"/>
          <input class="btn btn-warning" type="submit" name="status" value="In progress"/>
          <input class="btn btn-danger" type="submit" name="status" value="Canceled"/>
        </form>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Total</th>
                    <th scope="col">State</th>
                    <th scope="col">CreatedAt</th>
                    <th scope="col">UpdatedAt</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ($baskets as $key=> $command) {
            ?>
        <tr>
      <th scope="row"><?= $key; ?></th>
      <td><?= $command['firstname']." ".$command['lastname']; ?></td>
      <td><?= $command['total']; ?></td>      
      <td class="badge <?= statusClass($command['state']) ?> mt-2"><?= $command['state']; ?></td>      
      <td><?= $command['createdAt']; ?></td>      
      <td><?= $command['updatedAt']; ?></td>      
      <td>
    <button class="btn btn-secondary bi bi-eye" data-bs-toggle="modal"  data-bs-target="#order-<?=$command['basket_id'] ; ?>"
            ></button>
    <button class="btn btn-warning bi bi-pencil-square" data-bs-toggle="modal"  data-bs-target="#edit-order-<?=$command['basket_id'] ; ?>"
            ></button>
      </td>
      <td></td>
    </tr>
        <?php };?>
                </tbody>
            </table>
        </div>
    </div>
   <?php 
   foreach ($baskets as $basket) {
    ?>
     <div class="modal fade" id="order-<?= $basket['basket_id'] ;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 foreach ($orderDetails as $key => $orderDetail) {
                    if($orderDetail['basket_id'] === $basket['basket_id']){
                   ?>
                   <tr>
                       <td><?= $orderDetail['name']; ?></td>
                       <td><?= $orderDetail['quantity']; ?></td>
                       <td><?= $orderDetail['total']; ?></td>
                   </tr>
                <?php }}?>
                <tr>
                <td></td>
                <td></td>
                <td><?= $basket['total']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>
</div>
   <?php };
   ?>
<?php 
   foreach ($baskets as $basket) {
    ?>
     <div class="modal fade" id="edit-order-<?= $basket['basket_id'] ;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Order Detail</h5>
        <span class="badge <?= statusClass($basket['state']); ?> mx-5"><?= $basket['state']; ?></span>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        <select class="form-select" name="order-state" id="order-state">
                <option style="text-white height:55px" >In progress</option>
                <option style="text-white height:25px" >Canceled</option>
                <option style="text-white height:25px" >Delivered</option>
        </select>
        <input type="hidden" value="<?= $basket['basket_id'] ?>" name="basket_id">
        <button class="btn btn-primary mt-3" type="submit" name="edit-status">SAVE</button>
        </form>
    </div>
  </div>
</div>
</div>
   <?php };
   ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>