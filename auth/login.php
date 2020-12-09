<!DOCTYPE html>
<html lang="en">
  <head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="../css/globals.css">

  </head>
  <?php
  require_once "./loginHelper.php";
  ?>
  <body>
    <div class="container-fluid fill">

      <div class="row justify-content-center">
        <h1 class="p-3 text-white">Welcome back to asterisk</h1>
        <img src="/icon.png" class="img-fluid position-absolute icon p-3" width="75" height="75">
      </div>

      <div class="row justify-content-center m-3">
        <div class="card text-center" id="authForm">
          <div class="card-body">
            <div class="wrapper">
                <h2 class="text-white">Login</h2>
                <p class="text-white">Please fill in your credentials to login.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <input type="text" name="username" class="form-control transparent-input text-white" value="<?php echo $username; ?>" placeholder="Username">
                        <span class="help-block text-white"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <input type="password" name="password" class="form-control transparent-input text-white" placeholder="Password">
                        <span class="help-block text-white"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-light" value="Login">
                    </div>
                    <p class="text-white">Don't have an account? <strong><a class="text-white" href="register.php">Sign up now</a></strong>.</p>
                </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center m-3 fixed-bottom">
        <div class="align-self-center">
          <p class="text-white">Made by  <strong><a class="text-white" href="https://github.com/Trevato">Trevor Dobbertin</a></strong>.</p>
        </div>
      </div>
    </div>
  </body>
</html>
