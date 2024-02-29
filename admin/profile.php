<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" ></link>
    <title>Document</title>
</head>
<body>
<div class="bg-dark text-white" style="height:100%;">
    <div class="row col-12">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            <span class="font-weight-bold"><?= $_SESSION['firstname']; ?></span>
            <span class="text-white-50"><?= $_SESSION['email']; ?></span>
            <a class="btn btn-danger" href="../logout.php">Logout</a>
        </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Firstname</label><input type="text" class="form-control" placeholder="first name" value="<?= $_SESSION['firstname']; ?>"></div>
                    <div class="col-md-6"><label class="labels">Lastname</label><input type="text" class="form-control" value=<?= $_SESSION['lastname']; ?> placeholder="last name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email Adress</label><input type="email" class="form-control" placeholder="enter email" value=<?= $_SESSION['email']; ?>></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" placeholder="password" value=""></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-danger profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>