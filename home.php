<!DOCTYPE html>
<title>asterisk | trevor dobbertin</title>

<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="../css/globals.css">
  <link rel="stylesheet" href="./css/home.css">

</head>

<?php
session_start();
?>

<div class="container-fluid fill">
  <div class="row justify-content-center">
    <h1 class="p-3 mb-5 text-center text-white"><?php echo $_SESSION["username"] ?>'s asterisk</h1>
    <a class="p-3 mt-2 btn logout-button position-absolute" href="/auth/logout.php"><strong>Logout</strong></a>
  </div>

  <div class="row">
    <div class="col-4">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-overview-list" data-toggle="list" href="#overviewCard" role="tab">Overview</a>
        <a class="list-group-item list-group-item-action" id="list-financial-list" data-toggle="list" href="#financialCard" role="tab">Financial</a>
        <a class="list-group-item list-group-item-action" id="list-spiritual-list" data-toggle="list" href="#spiritualCard" role="tab">Spiritual</a>
        <a class="list-group-item list-group-item-action" id="list-mental-list" data-toggle="list" href="#mentalCard" role="tab">Mental</a>
        <a class="list-group-item list-group-item-action" id="list-physical-list" data-toggle="list" href="#physicalCard" role="tab">Physical</a>
        <a class="list-group-item list-group-item-action" id="list-academic-list" data-toggle="list" href="#academicCard" role="tab">Academic</a>
      </div>
    </div>
    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-overview" role="tabpanel">...</div>

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
            <!-- <button data-toggle="modal" data-target="#financialModal" class="btn stretched-link">Update</button> -->
          </div>
          <div class="card-footer text-white">
            2 days ago
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
            <p class="card-text text-white">7/10</p>
            <p class="card-text text-white change">0</p>
            <button data-toggle="modal" data-target="#physicalModal" class="btn stretched-link btn-dark">Update</button>
          </div>
          <div class="card-footer text-white">
            1 day ago
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
          <form class="form-inline">
            <label class="sr-only" for="physicalSelfRankLabel">Self-ranking</label>
            <div class="d-flex justify-content-center">
              <input type="range" class="custom-range" id="physicalSelfRank" min="0" max="10">
              <span class="font-weight-bold text-primary ml-2 physicalSelfRankSpan"></span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a href="./aboutPages/physicalAbout.html" type="button" class="btn btn-warning">More Info</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
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
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(245, 245, 245, 0.2)',
                'rgba(245, 245, 245, 0.2)',
                'rgba(245, 245, 245, 0.2)',
                'rgba(245, 245, 245, 0.2)',
                'rgba(245, 245, 245, 0.2)',
                'rgba(245, 245, 245, 0.2)'
            ],
            borderColor: [
                'rgba(245, 245, 245, 1)',
                'rgba(245, 245, 245, 1)',
                'rgba(245, 245, 245, 1)',
                'rgba(245, 245, 245, 1)',
                'rgba(245, 245, 245, 1)',
                'rgba(245, 245, 245, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
