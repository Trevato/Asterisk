<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/initializer.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(!empty($_GET['account1'])){
    session_start();
  }
}

$account1 = $_GET['account1'];
$account2 = $_GET['account2'];
$account = 0;

$type = 0;

$username = $_SESSION['username'];
$user_id = -1;

$counter = 0;

// Get user_id
$sql = "SELECT id FROM authusers WHERE username = :username";

if($stmt = $pdo->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);

    // Attempt to execute the prepared statement
    if($stmt->execute()){
        if($stmt->rowCount() == 1){
            if($row = $stmt->fetch()){
                $user_id = $row["id"];
                }
            }
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

// Close statement
unset($stmt);

if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(!empty($_GET['account1'])){

    while ($counter < 2){

      if ($counter == 0){
        $account = $account1;
      }
      if ($counter == 1){
        $account = $account2;
      }

      $sql = "INSERT INTO userdata (user, type, x, y) VALUES (:id, :type, :x, :y)";
      if($stmt = $pdo->prepare($sql)){
        $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
        $stmt->bindParam(":type", $type, PDO::PARAM_STR);
        $stmt->bindParam(":x", $counter, PDO::PARAM_STR);
        $stmt->bindParam(":y", $account, PDO::PARAM_STR);
        $stmt->execute();
      }
      $counter += 1;
    }
    header("location:../../home.php");
  }
}

?>
