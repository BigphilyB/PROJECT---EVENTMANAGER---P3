<!doctype html>
<html lang="en">
<?php
require 'config.php';
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <title>EventFinder || Event</title>
</head>
<body>
<?php require ('php/navbar.php')?>
<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
        <h1 class="text-white">EventFinder</h1>
        <p class="text-white lead">An easy way to find events!</p>
      </div>
    </div>
  </div>
</header>

<!-- Page Content -->
<section class="py-5">
  <div class="container">
    <form method="POST" action="php/ticket_function.php" multipart/form-data">
    <div class="form-group">
      <h4>Name:</h4>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
      <h4>Email:</h4>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
      <h4>Phonenumber:</h4>
      <input type="tel" name="phonenumber" id="phonenumber" class="form-control" required>
    </div>
    <div class="form-group">
      <h4>Zipcode:</h4>
      <input type="text" name="zipcode" id="zipcode" class="form-control" required>
    </div>
    <div class="form-group">
      <h4>Adress:</h4>
      <input type="text" name="adress" id="adress" class="form-control" required>
    </div>
    <div class="form-group">
      <h4>City:</h4>
      <input type="text" name="city" id="city" class="form-control" required>
    </div>
    <div class="form-group">
      <h4>Date of Birth:</h4>
      <input type="date" name="dob" id="dob" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="eventName">Event:</label>
      <select id="eventName" name="eventName" required>
        <option>
          <?php
          $sql = "SELECT EventName, CurrentTickets FROM events";
          if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
              echo "<option>" . $row['EventName'] . "</option>";
            }
          }
          ?>
      </select>
      <div class="form-group">
        <label for="ticket">Hoeveel tickets wilt u bestellen?</label>
        <div id="input_number">Selecteer eerst een evenement:</div required>
      </div>
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="submit" value="Submit">
    </div>
    </form>
  </div>
</section>
<footer class="footer">
  <div class="container">
    <span class="text-muted">© EventFinder 2021 - 2021</span>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

</body>
<?php

if (isset($_POST["submit"])) {
  $eventName = $_POST["eventName"];
  $currentTickets = "SELECT `CurrentTickets` FROM events WHERE EventName = $eventName";
  $cTickets = $_POST["ticketsBought"];


  if ($eventName == "" or NULL) {
    echo "Error: " . $sql . "<br>" . $conn->error;
  } else {
    if ($cTickets == 0) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  $sql = "UPDATE `events` SET `CurrentTickets`= CurrentTickets - $cTickets WHERE `EventName` = '$eventName';";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  mysqli_close($conn);
}


?>
</html>

