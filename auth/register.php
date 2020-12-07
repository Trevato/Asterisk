<!DOCTYPE html>
<title>asterisk | trevor dobbertin</title>

<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/register.css">
  <link rel="stylesheet" href="../css/globals.css">

</head>

<?php
// Include config file
require_once "./registerHelper.php";
?>

<div class="container-fluid fill">

  <div class="row justify-content-center">
    <h1 class="p-3 text-white">Welcome to asterisk</h1>
  </div>

  <div class="row justify-content-center m-3">
    <div class="card text-center" id="authForm">
      <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="username" class="form-control transparent-input text-white" value="<?php echo $username; ?>" placeholder="Username">
                <span class="help-block text-white"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="password" class="form-control transparent-input text-white" value="<?php echo $password; ?>" placeholder="Password">
                <span class="help-block text-white"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="confirm_password" class="form-control transparent-input text-white" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password">
                <span class="help-block text-white"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-light" value="Submit">
            </div>
            <p class="text-white">Already have an account? <strong><a class="text-white" href="login.php">Login here</a></strong>.</p>
        </form>
      </div>
    </div>
  </div>

  <div class="row justify-content-center m-3 fixed-bottom">
    <div class="align-self-center">
      <p class="text-white">Made by  <strong><a class="text-white" href="https://github.com/Trevato">Trevor Dobbertin</a></strong>.</p>
    </div>
  </div>

</div>
