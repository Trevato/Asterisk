<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/initializer.php";

session_start();

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

$data = array();
$x = array();
$y = array();
$date = array();

// Get user selections
$sql = "SELECT x, y, entrydate FROM userdata WHERE type = 4 AND user = :id";

if($stmt = $pdo->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);

    // Attempt to execute the prepared statement
    if($stmt->execute()){
        if($stmt->rowCount() >= 1){
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              // Add all in-use trackers to array
              $x[] = $row["x"];
              $y[] = $row["y"];
              $date[] = $row["entrydate"];
            }

          $data['account'] = $x;
          $data['value'] = $y;
          $data['date'] = $date;
          }
        }
    }

echo json_encode($data);
// Close statement
unset($stmt);

?>
