<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/initializer.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(!empty($_GET['trackerCheckbox'])){
    session_start();
  }
}

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
  if(!empty($_GET['trackerCheckbox'])){
    $name = $_GET['trackerCheckbox'];

    $counter = 0;
    $active = 0;
    while($counter < 5){
      if (in_array($counter, $name)){
        $active = 1;
      } else {
        $active = 0;
      }
      $sql = "UPDATE userselecteddata SET active = :active WHERE user = :id AND type = :type";
      if($stmt = $pdo->prepare($sql)){
        $stmt->bindParam(":active", $active, PDO::PARAM_STR);
        $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
        $stmt->bindParam(":type", $counter, PDO::PARAM_STR);
        $stmt->execute();
      }
      $counter+=1;
    }
    echo $_SERVER['DOCUMENT_ROOT'];
    header("location:../settings.php");
  }
}

$trackers = array();

// Get user selections
$sql = "SELECT type FROM userselecteddata WHERE active = 1 AND user = :id";

if($stmt = $pdo->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);

    // Attempt to execute the prepared statement
    if($stmt->execute()){
        if($stmt->rowCount() >= 1){
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              // Add all in-use trackers to array
              $trackers[] = $row["type"];
            }
          } else {
            echo "No results";
          }
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

// Close statement
unset($stmt);

?>
