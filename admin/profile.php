<?php
include "../utils/fetchUtils.php";
session_start();
if(!isset($_SESSION['isAdminAuth'])){
    header("location:login.php");
}
if(isset($_POST['save'])){
    updateAdminProfile($_POST);
    header("location:login.php");
}
$user = getAdminProfile($_SESSION['admin_id']);
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
        <div class="bg-light text-dark col">
        <h1 class="text-center bg-dark text-danger py-2"><>Profile&lt/></h1>
            <div class="d-flex">
                <div class="col-md-5 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold"><?= $user['firstname']; ?></span>
                    <span class="text-white-50"><?=  $user['email']; ?></span>
                    <a class="btn btn-danger" href="../logout.php">Logout</a>
                </div>
                </div>
                <div class="col-md border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <form action="" method="POST">
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Firstname</label><input type="text" class="form-control" placeholder="first name" name="firstname" value="<?= $user['firstname']; ?>"></div>
                                <div class="col-md-6"><label class="labels">Lastname</label><input type="text" class="form-control" name="lastname" value=<?= $user['lastname']; ?> placeholder="last name"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Email Adress</label><input type="email" class="form-control" placeholder="enter email" name="email" value=<?= $user['email']; ?>></div>
                                <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" placeholder="password" name="password"></div>
                            </div>
                            <input type="hidden" name="admin_id" value="<?=  $user['admin_id'] ?>">
                            <div class="mt-5 text-center"><button class="btn btn-danger profile-button" type="submit" name="save">Save Profile</button></div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>