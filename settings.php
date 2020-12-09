<!DOCTYPE html>
<title>asterisk | trevor dobbertin</title>

<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/globals.css">
  <link rel="stylesheet" href="./css/settings.css">

</head>

<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] ."/initializer.php";
include("trackers/getTrackers.php");
?>


<div class="container-fluid fill">
  <div class="row justify-content-center">
    <h1 class="p-3 mb-5 text-white"><?php echo $_SESSION["username"] ?>'s asterisk</h1>
  </div>

  <div class="row">
    <div class="col-4">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-edit-trackers-list" data-toggle="list" href="#editTrackersCard" role="tab">Edit Trackers</a>
        <a class="list-group-item list-group-item-action" id="list-change-password-list" data-toggle="list" href="#changePasswordCard" role="tab">Change Password</a>
      </div>
    </div>



    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">

        <div class="card text-center tab-pane fade show active" id="editTrackersCard">
          <h5 class="card-header text-white">Edit Trackers</h5>
          <div class="card-body">
            <form action="trackers/getTrackers.php" method="get">
              <p class="card-text text-white">
                <label class="container">Financial
                  <input class="trackerCheckbox" type="checkbox"
                  <?php if (in_array(0, $trackers)){
                    echo 'checked="checked"';
                  }
                  ?> name="trackerCheckbox[]" value="0">
                  <span class="checkmark"></span>
                </label>
              </p>
              <p class="card-text text-white">
                <label class="container">Spiritual
                  <input class="trackerCheckbox" type="checkbox"
                  <?php if (in_array(1, $trackers)){
                    echo 'checked="checked"';
                  }
                  ?> name="trackerCheckbox[]" value="1">
                  <span class="checkmark"></span>
                </label>
              </p>
              <p class="card-text text-white">
                <label class="container">Mental
                  <input class="trackerCheckbox" type="checkbox"
                  <?php if (in_array(2, $trackers)){
                    echo 'checked="checked"';
                  }
                  ?> name="trackerCheckbox[]" value="2">
                  <span class="checkmark"></span>
                </label>
              </p>
              <p class="card-text text-white">
                <label class="container">Physical
                  <input class="trackerCheckbox" type="checkbox"
                  <?php if (in_array(3, $trackers)){
                    echo 'checked="checked"';
                  }
                  ?> name="trackerCheckbox[]" value="3">
                  <span class="checkmark"></span>
                </label>
              </p>
              <p class="card-text text-white">
                <label class="container">Academic
                  <input class="trackerCheckbox" type="checkbox"
                  <?php if (in_array(4, $trackers)){
                    echo 'checked="checked"';
                  }
                  ?> name="trackerCheckbox[]" value="4">
                  <span class="checkmark"></span>
                </label>
              </p>
              <br />
              <input class="btn" type="submit" value="Save">
            </form>
          </div>
        </div>
        </div>
      </div>
    <!-- <div class="btn">
      <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-eye" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
      </svg>
    </div> -->
  </div>

  <div class="row justify-content-center m-3 fixed-bottom">
    <div class="align-self-center">
      <p class="text-white">Made by  <strong><a class="text-white" href="https://github.com/Trevato">Trevor Dobbertin</a></strong>.</p>
    </div>
  </div>
</div>
