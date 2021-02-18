<?php


require ('../config.php');

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
  header("location: index.php");
  exit;
}

if( isset($_GET['upd']) ) {
  $EventNumber     = $_GET['upd'];
  $query  = "SELECT *, DATE_FORMAT(EventStartDate, '%Y-%m-%dT%H:%i') AS defaultValueStartDate, DATE_FORMAT(EventEndDate, '%Y-%m-%dT%H:%i') AS defaultValueEndDate  FROM `events` WHERE EventNumber=$EventNumber";
  $result = mysqli_query($conn, $query);
  $user   = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  mysqli_close($conn);
}

if( isset($_POST['event_update']) ) {
  $target = "../img/event_img/" . basename($_FILES['imgup']['name']);

  $EventNumber = $_POST['EventNumber'];
  $eventnameup = $_POST['eventnameup'];
  $eventdescup  = $_POST['eventdescup'];
  $eventstartup     = $_POST['eventstartup'];
  $eventendup  = $_POST['eventendup'];
  $eventhostup     = $_POST['eventhostup'];
  $eventmaxticketsup    = $_POST['eventmaxticketsup'];
  $priceticketsup  = $_POST['priceticketsup'];
  $eventlocationup = $_POST['eventlocationup'];
  $imgup = $_FILES['imgup']['name'];


  $query  = "UPDATE `events` SET EventName='$eventnameup', EventDiscription='$eventdescup', EventStartDate='$eventstartup', EventEndDate ='$eventendup ', EventHost='$eventhostup',  CurrentTickets='$eventmaxticketsup', TicketPrice='$priceticketsup', EventLocation='$eventlocationup', EventImg='$imgup' WHERE EventNumber='$EventNumber'";
  header('events.php');
  $result = mysqli_query($conn, $query) or die('Cannot update data in database. '.mysqli_error($conn));
  $user   = mysqli_close($conn);
  if($result) header('Location: events.php');
  if (move_uploaded_file($_FILES['imgup']['tmp_name'], $target)) {

  }

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
    <div class="sidebar-heading"><strong>EventFinder</strong></div>
    <div class="list-group list-group-flush">
      <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Overview</a>
      <a href="eventcreator.php" class="list-group-item list-group-item-action bg-light">Create Event</a>
      <a href="events.php" class="list-group-item list-group-item-action bg-light">All Events</a>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" enctype="multipart/form-data">
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
      <h1 class="text-center mt-3">Update Event <strong><?php echo $user['EventName'] ?></strong></h1>
      <form class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4" action="update.php" method="POST" enctype="multipart/form-data">
        <div class="form-group d-none">
          <input type="text" value="<?php echo $user['EventNumber']?>" name="EventNumber" id="EventNumber">
        </div>
        <div class="form-group">
          <label for="eventname">EventName</label>
          <input type="text" class="form-control" value="<?php echo $user['EventName'] ?>" id="eventnameup" name="eventnameup" placeholder="Enter Event Name:">
        </div>
        <div class="form-group">
          <label for="eventdesc">Event Description</label>
          <textarea type="text" class="form-control" id="eventdescup" name="eventdescup" placeholder="Enter Event Description:"><?php echo $user['EventDiscription'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="eventstart">Event Start Date: (<?php echo $user['EventStartDate'] ?>)</label>
          <input type="datetime-local" value="<?php echo $user['defaultValueStartDate'] ?>" class="form-control" id="eventstartup" name="eventstartup">
        </div>
        <div class="form-group">
          <label for="eventend">Event End Date: (<?php echo $user['EventEndDate'] ?>)</label>
          <input type="datetime-local" value="<?php echo $user['defaultValueEndDate']?>" class="form-control"  id="eventendup" name="eventendup" placeholder="Event Start Date:">
        </div>
        <div class="form-group">
          <label for="eventhost">Event Host</label>
          <input type="text" value="<?php echo $user['EventHost'] ?>" class="form-control" id="eventhostup" name="eventhostup" placeholder="Enter Event Host:">
        </div>
        <div class="form-group">
          <label for="eventmaxtickets">Event Tickets Available</label>
          <input type="number" value="<?php echo $user['CurrentTickets'] ?>" class="form-control" id="eventmaxticketsup" name="eventmaxticketsup" placeholder="Enter Event Tickets:">
        </div>
        <div class="form-group">
          <label for="pricetickets">Price Tickets</label>
          <input type="number" value="<?php echo $user['TicketPrice'] ?>" class="form-control" id="priceticketsup" name="priceticketsup" placeholder="Enter Ticket Prices:">
        </div>
        <div class="form-group">
          <label for="eventlocation">Event Location</label>
          <input type="text"  value="<?php echo $user['EventLocation'] ?>"class="form-control" id="eventlocationup" name="eventlocationup" placeholder="Enter Event Location:">
        </div>
        <div class="form-group">
          <div class="card border-0">
            <div class="card-body">
              <label for="img">Current Event Image</label>
              <img src="../img/event_img/<?php echo $user['EventImg'] ?>" class="img-fluid rounded-lg" name="imgup" id="imgup" type="image" alt="Responsive image" value="../img/event_img/<?php echo $user['EventImg'] ?>">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="imgup">New Event Image</label>
          <input  type="file" name="imgup" id="imgup">
        </div>
        <input  class="btn-primary btn" type="submit" name="event_update" value="Update">
        <a href="./events.php"><input  class="btn-primary btn" value="Go Back"></a>
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
