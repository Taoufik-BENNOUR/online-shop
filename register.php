<?php
require_once "./utils/fetchUtils.php";

if(!empty($_POST)){
  addVisitor($_POST);
  header("Location:register.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O-Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
  include "navbar.php";
  ?>
      <div class="d-flex justify-content-center mt-5">
        <form action="register.php" method="POST">
            <div class="form-outline mb-1">
              <h1>Register</h1>
            </div>
            <div class="form-outline mb-1">
              <label class="form-label" for="firstname">Firstname</label>
              <input type="text" id="firstname" name="firstname" class="form-control" />
            </div>
            <div class="form-outline mb-1">
              <label class="form-label" for="lastname">Lastname</label>
              <input type="text" id="lastname" name="lastname" class="form-control" />
            </div>
            <div class="form-outline mb-1">
              <label class="form-label" for="phone">Phone number</label>
              <input type="text" id="phone" name="phone" class="form-control" />
            </div>
            <div class="form-outline mb-1">
              <label class="form-label" for="email">Email address</label>
              <input type="email" id="email" name="email" class="form-control" />
            </div>
          
            <div class="form-outline mb-1">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control" />
            </div>
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                  <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
              </div>
          
              <div class="col">
                <a href="#!">Forgot password?</a>
              </div>
            </div>
          
            <button type="submit" class="btn btn-success btn-block mb-4">Sign up</button>
          
            <div class="text-center">
              <p>A member? <a href="login.php">Login</a></p>
            </div>
          </form>
      </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>