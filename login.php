<?php
require_once "./utils/fetchUtils.php";
session_start();

if(isset($_SESSION['isAuth'])){
  header("location:profile.php");
}

if(!empty($_POST)){
  $user =login($_POST);
  if($user){
    $_SESSION["firstname"] = $user['firstname'];
    $_SESSION["lastname"] = $user['lastname'];
    $_SESSION["email"] = $user['email'];
    $_SESSION["phone"]= $user['phone'];
    $_SESSION["user_id"]= $user['user_id'];
    $_SESSION["state"] = $user['state'];
    $_SESSION["isAuth"] = true; 
    header('location:index.php');
  } else {
    $_SESSION['error_message'] = "Wrong email or password";
    header('Location:'.$_SERVER['PHP_SELF']);
    return;
  }
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
        <form action="login.php" method="POST">
            <div class="form-outline mb-1">
              <h1>Login</h1>
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
            <h6 class="text-danger">
            <?php
        if (isset($_SESSION['error_message']) ) {
            echo $_SESSION['error_message'];
            unset($_SESSION['error_message']);
          }
        ?>
            </h6>
            <button type="submit" class="btn btn-success btn-block mb-4">Sign in</button>
                      <div class="text-center">
              <p>Not a member? <a href="register.php">Register</a></p>
            </div>
          </form>
      </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>