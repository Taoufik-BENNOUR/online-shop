<?php
require "../utils/fetchUtils.php";
$users = getUsers();
if(isset($_POST['validate'])&&isset($_POST['user_id'])){
    validateUser($_POST['user_id']);
    header("location:".$_SERVER['PHP_SELF']);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Users</title>
</head>
<body>
    <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
        <div class="col">
            <h1 class="text-center bg-dark text-danger py-2">Users</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">State</th>
                    <th scope="col">CreatedAt</th>
                    <th scope="col">UpdatedAt</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ($users as $key=> $user) {
            ?>
        <tr>
      <th scope="row"><?= $key; ?></th>
      <td><?= $user['firstname']; ?></td>
      <td><?= $user['lastname']; ?></td>      
      <td><?= $user['email']; ?></td>      
      <td><?= $user['state']; ?></td>      
      <td><?= $user['createdAt']; ?></td>      
      <td><?= $user['updatedAt']; ?></td>      
      <td>
         <div style="display: inline-block;">
        <form method="post" style="margin: 0; padding: 0;">
            <input type="hidden" value="<?= $user['user_id']; ?>" name="user_id" />
            <button class="btn <?= $user['state']===1?"btn-success":"btn-danger"; ?>" type="submit" name="validate"  
            <?= $user['state']===0?"":"disabled"; ?>
            >Validate</button>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>