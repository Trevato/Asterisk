<?php
session_start();
if(!isset($_SESSION["loggedin"])){
  header("location: /auth/login.php");
  exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] ."/initializer.php";
include("trackers/getTrackers.php");
ob_start();

?>
<!DOCTYPE html>
<title>asterisk | trevor dobbertin</title>

<head>

  <!-- Send to login if not logged in -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/globals.css">
  <link rel="stylesheet" href="./css/home.css">

</head>

<div class="container-fluid fill">
  <div class="row justify-content-center">
    <h1 class="p-3 mb-5 text-center text-white"><?php echo $_SESSION["username"] ?>'s asterisk</h1>
    <div class="p-3 mt-2 dropdown show position-absolute">
      <a class="btn dropdown-toggle show btn-sterisk-custom" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
        More
      </a>

      <div class="dropdown-menu">
        <a class="dropdown-item" href="/settings.php">Settings</a>
        <a class="dropdown-item" href="/auth/logout.php">Logout</a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-4">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-overview-list" data-toggle="list" href="#overviewCard" role="tab">Overview</a>
        <a
        <?php if (!in_array(0, $trackers)){
          echo 'hidden';
        }
        ?>
        class="list-group-item list-group-item-action" id="list-financial-list" data-toggle="list" href="#financialCard" role="tab">Financial</a>
        <a
        <?php if (!in_array(1, $trackers)){
          echo 'hidden';
        }
        ?>
        class="list-group-item list-group-item-action" id="list-spiritual-list" data-toggle="list" href="#spiritualCard" role="tab">Spiritual</a>
        <a
        <?php if (!in_array(2, $trackers)){
          echo 'hidden';
        }
        ?>
        class="list-group-item list-group-item-action" id="list-mental-list" data-toggle="list" href="#mentalCard" role="tab">Mental</a>
        <a
        <?php if (!in_array(3, $trackers)){
          echo 'hidden';
        }
        ?>
        class="list-group-item list-group-item-action" id="list-physical-list" data-toggle="list" href="#physicalCard" role="tab">Physical</a>
        <a
        <?php if (!in_array(4, $trackers)){
          echo 'hidden';
        }
        ?>
        class="list-group-item list-group-item-action" id="list-academic-list" data-toggle="list" href="#academicCard" role="tab">Academic</a>
      </div>
    </div>
    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="card bg-info text-center tab-pane fade show active" id="overviewCard">
          <div class="card-body">
            <h5 class="card-title text-white">Overview</h5>
            <p class="card-text text-white">Under Construction</p>
          </div>
          <div class="card-footer text-white">
            2 days ago
          </div>
        </div>

        <div class="card text-center tab-pane fade" id="financialCard">
          <div class="card-body">
            <h5 class="card-title text-white">Financial</h5>
            <div class="row">
              <div class="col-8">
                <canvas class="chart" id="financialChart"></canvas>
              </div>
              <div class="col-4">
                <p class="card-text text-white">$10,0000</p>
                <p class="card-text text-white change">100</p>
              </div>
            </div>
          </div>
          <div class="card-footer text-white">
            <button data-toggle="modal" data-target="#financialModal" class="btn btn-sterisk-custom"><strong>Enter New Data</strong></button>
          </div>
        </div>

        <div class="card bg-info text-center tab-pane fade" id="spiritualCard">
          <div class="card-body">
            <h5 class="card-title text-white">Spiritual</h5>
            <p class="card-text text-white">8/10</p>
            <p class="card-text text-white change">0</p>
            <button data-toggle="modal" data-target="#spiritualModal" class="btn stretched-link btn-dark">Update</button>
          </div>
          <div class="card-footer text-white">
            2 days ago
          </div>
        </div>

        <div class="card bg-warning text-center tab-pane fade" id="mentalCard">
          <div class="card-body">
            <h5 class="card-title text-white">Mental</h5>
            <p class="card-text text-white">5/10</p>
            <p class="card-text text-white change">-2</p>
            <button data-toggle="modal" data-target="#mentalModal" class="btn stretched-link btn-dark">Update</button>
          </div>
            <div class="card-footer text-white">
              Just now
            </div>
        </div>

        <div class="card bg-danger text-center tab-pane fade" id="physicalCard">
          <div class="card-body">
            <h5 class="card-title text-white">Physical</h5>
            <div class="row">
              <div class="col-8">
                <canvas class="chart" id="physicalChart"></canvas>
              </div>
              <div class="col-4">
                <p class="card-text text-white">7/10</p>
                <p class="card-text text-white change">0</p>
              </div>
            </div>
          </div>
          <div class="card-footer text-white">
            <button data-toggle="modal" data-target="#physicalModal" class="btn btn-sterisk-custom"><strong>Enter New Data</strong></button>
          </div>
        </div>

        <div class="card bg-secondary text-center tab-pane fade" id="academicCard">
          <div class="card-body">
            <h5 class="card-title text-white">Academic</h5>
            <p class="card-text text-white">8/10</p>
            <p class="card-text text-white change">0</p>
            <button data-toggle="modal" data-target="#academicModal" class="btn stretched-link btn-dark">Update</button>
          </div>
          <div class="card-footer text-white">
            2 days ago
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="financialModal" tabindex="-1" role="dialog" aria-labelledby="financalModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="financialModalLabel">Financial Data Entry</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="font-weight-light">Please answer these questions to update your personal financial score.</p>
          <form class="form-inline" action="trackers/enterData/financialdata.php" method="get">
            <label class="sr-only" for="financialAccount1Label">Account 1</label>
            <div class="input-group mb-2 mr-sm-2">
              <input type="number" class="form-control" name="account1" id="financialAccount1" placeholder="Account 1">
            </div>

            <label class="sr-only" for="financialAccount2Label">Account 2</label>
            <div class="input-group mb-2 mr-sm-2">
              <input type="number" class="form-control" name="account2" id="financialAccount2" placeholder="Account 2">
            </div>
        </div>
        <div class="modal-footer">
          <a href="./aboutPages/financialAbout.html" type="button" class="btn btn-warning">More Info</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="mentalModal" tabindex="-1" role="dialog" aria-labelledby="mentalModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mentalModalLabel">Mental Quiz</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="font-weight-light">Please answer these questions to update your personal mental health score.</p>
          <form class="form-inline">
            <label class="sr-only" for="mentalSelfRankLabel">Self-ranking</label>
            <div class="d-flex justify-content-center">
              <input type="range" class="custom-range" id="mentalSelfRank" min="0" max="10">
              <span class="font-weight-bold text-primary ml-2 mentalSelfRankSpan"></span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a href="./aboutPages/mentalAbout.html" type="button" class="btn btn-warning">More Info</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="physicalModal" tabindex="-1" role="dialog" aria-labelledby="physicalModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="physicalModalLabel">Physical Quiz</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="font-weight-light">Please answer these questions to update your personal physical health score.</p>
          <form class="form-inline" action="trackers/enterData/physicaldata.php" method="get">
            <label class="sr-only" for="physicalSelfRankLabel">Self-ranking</label>
            <div class="d-flex justify-content-center">
              <label class="sr-only" for="physicalSelfRank">Active Hours Today</label>
              <input type="range" name="activeHours" class="custom-range" id="physicalSelfRank" min="0" max="10">
              <span class="font-weight-bold text-primary ml-2 physicalSelfRankSpan"></span>
            </div>
        </div>
        <div class="modal-footer">
          <a href="./aboutPages/financialAbout.html" type="button" class="btn btn-warning">More Info</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="academicModal" tabindex="-1" role="dialog" aria-labelledby="financalModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="academicModalLabel">Academic Quiz</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="font-weight-light">Please answer these questions to update your personal academic score.</p>
          <form class="form-inline">
            <label class="sr-only" for="academicGPALabel">GPA</label>
            <div class="input-group mb-2 mr-sm-2">
              <input type="number" class="form-control" id="academicGPA" placeholder="GPA">
            </div>

            <label class="sr-only" for="academicHoursStudiedLabel">Hours Studied</label>
            <div class="input-group mb-2 mr-sm-2">
              <input type="number" class="form-control" id="academicHoursStudied" placeholder="Hours Studied">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a href="./aboutPages/academicAbout.html" type="button" class="btn btn-warning">More Info</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
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

<script>
  $(document).ready(function() {

    const $valueSpan = $('.spiritualSelfRankSpan');
    const $value = $('#spiritualSelfRank');
    $valueSpan.html($value.val());
    $value.on('input change', () => {

      $valueSpan.html($value.val());
    });
  });

  $(document).ready(function() {
    const $valueSpan = $('.mentalSelfRankSpan');
    const $value = $('#mentalSelfRank');
    $valueSpan.html($value.val());
    $value.on('input change', () => {

      $valueSpan.html($value.val());
    });
  });

  $(document).ready(function() {
    const $valueSpan = $('.physicalSelfRankSpan');
    const $value = $('#physicalSelfRank');
    $valueSpan.html($value.val());
    $value.on('input change', () => {

      $valueSpan.html($value.val());
    });
  });


</script>


<!-- Chart js -->
<script>
$.ajax({
  url : "http://localhost/trackers/gatherData/financialdata.php",
  type : "GET",
  success : function(data){
    var userid = [];
    var account1 = [{}];
    var account2 = [{}];

    var parsed = jQuery.parseJSON(data);

    var accounts = parsed['account'];
    var values = parsed['value'];
    var dates = parsed['date'];

    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    for (date in dates) {
      dates[date] = new Date(dates[date]);
    }

    for (i in accounts) {
      if (accounts[i] == 0) {
        account1.push({
          x: dates[i],
          y: values[i]
        });
      }
      if (accounts[i] == 1) {
        account2.push({
          x: dates[i],
          y: values[i]
        });
      }
    }

    console.log(account1);
    console.log(account2);

    var chartdata = {
      labels: dates,
      datasets: [
        {
          label: "Account 1",
          fill: true,
          lineTension: 0,
          showline: true,
          backgroundColor: "rgba(245, 245, 245, 0.2)",
          borderColor: "rgba(245, 245, 245, 1)",
          pointHoverBackgroundColor: "rgba(0, 0, 0, .2)",
          pointHoverBorderColor: "rgba(0, 0, 0, 1)",
          data: account1
        },
        {
          label: "Account 2",
          fill: true,
          lineTension: 0,
          showline: true,
          backgroundColor: "rgba(245, 245, 245, 0.2)",
          borderColor: "rgba(245, 245, 245, 1)",
          pointHoverBackgroundColor: "rgba(0, 0, 0, .2)",
          pointHoverBorderColor: "rgba(0, 0, 0, 1)",
          data: account2
        }
      ]
    };

    var ctx = $("#financialChart");

    var LineGraph = new Chart(ctx, {
      type: 'line',
      data: chartdata,
      options: {
        scales: {
            xAxes: [{
                type: 'time',
                time: {
                    unit: 'minute'
                }
            }]
        }
      }
    });
  },
  error : function(data) {
    console.log('Error fetching data.');
  }
});

</script>
