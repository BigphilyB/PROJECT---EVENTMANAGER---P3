<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
  header("location: index.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EventFinder || EventCreator</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/88e5c2c5f3.js" crossorigin="anonymous"></script>

  <!-- Custom styles for this template -->
  <link href="./csmslogin.css" rel="stylesheet">

</head>

<body>

<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">EventFinder </div>
    <div class="list-group list-group-flush">
      <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Overview</a>
      <a href="eventcreator.php" class="list-group-item list-group-item-action bg-light">Create Event</a>
      <a href="#" class="list-group-item list-group-item-action bg-light">All Events</a>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars mr-3"></i>Toggle Menu</button>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <p class="nav-link">Welcome back! <strong><?php echo $_SESSION['username']?></strong></p>
          </li>
          <li class="nav-item">
            <a href="logout.php"><button type="button" class="btn-primary btn">Logout</button></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid">
      <h1 class="text-center mt-3">Create Event</h1>
      <form class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
        <div class="form-group">
          <label for="eventname">EventName</label>
          <input type="text" class="form-control" id="eventname" placeholder="Enter Event Name:">
        </div>
        <div class="form-group">
          <label for="eventdesc">Event Description</label>
          <input type="text" class="form-control" id="eventname" placeholder="Enter Event Description:">
        </div>
        <div class="form-group">
          <label for="eventstart">Event Start Date</label>
          <input type="datetime-local" class="form-control" id="eventstart" placeholder="Event Start Date:">
        </div>
        <div class="form-group">
          <label for="eventend">Event End Date</label>
          <input type="datetime-local" class="form-control" id="eventend" placeholder="Event Start Date:">
        </div>
        <div class="form-group">
          <label for="eventhost">Event Host</label>
          <input type="text" class="form-control" id="eventhost" placeholder="Enter Event Host:">
        </div>
        <div class="form-group">
          <label for="eventmaxtickets">Event Tickets Available</label>
          <input type="number" class="form-control" id="eventmaxtickets" placeholder="Enter Event Tickets:">
        </div>
        <div class="form-group">
          <label for="eventimg">Event Image</label>
          <input  type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

</div>
<!-- JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>

</body>

</html>
