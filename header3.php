<?php
session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Hospital DB</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script src="ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="bodystyle.css" />

</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
        <div class="container-fluid">
          <!--<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
          </div>-->
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Logged as: <?php echo $_SESSION['loginType'] ?></a></li>
              <li><a href="include/logout.inc.php">Log out</a></li>
            </ul>
            <form class="navbar-form navbar-right">
              <!--<input type="text" class="form-control" placeholder="Search...">-->
            </form>
          </div>
        </div>
      </nav>


      <div class="container-fluid">
        <div class="content row">
          <div class="col-sm-3 sidenav hidden-xs ">
            <img src="img/ambulance.png" height="150px" width="150px" />
            <h2>Hospital DB</h2>
            <ul class="nav nav-pills nav-stacked ">
              <li class="#active"><a href="<?php echo $_SESSION['loginType']?>.php">Dashboard</a></li>
              <li><a href="physician.php">Physician</a></li>
              <li><a href="testdeetz.php">Test List</a></li>
              <li><a href="warddeetz.php">Wards</a></li>

            </ul><br>
          </div>
          <br>
