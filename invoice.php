<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">

  <title>EventFinder || Home</title>
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
    <h2 class=" text-success text-center p-3">Order successfully received!</h2>
    <?php
    $con = mysqli_connect("localhost", "root", "", "project_eventmanager_p3"); //Connect to database

    $ClientID = $_GET['ClientID'];
    $query = "SELECT * FROM clients WHERE ClientID=$ClientID";
    $result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
    if(mysqli_num_rows($result) > 0) {
      while($user = mysqli_fetch_assoc($result)) {?>
        <h1 class="text-center"><?php echo $user['EventName'] ?></h1>
        <h4 class="text-center">Bought Tickets: <?php echo $user['BoughtTickets'] ?></h4>
        <h3 class="text-center">Order Details:</h3>
        <p class="text-center"><?php echo $user['Name'] ?></p>
        <p class="text-center"><?php echo $user['Email'] ?></p>
        <p class="text-center"><?php echo $user['PhoneNumber'] ?></p>
        <p class="text-center"><?php echo $user['ZipCode'] ?></p>
        <p class="text-center"><?php echo $user['Adress'] ?></p>
        <p class="text-center"><?php echo $user['City'] ?></p>
        <?php
      }
    }
    mysqli_free_result($result);
    mysqli_close($con);
    ?>

  </div>
</section>
<footer class="footer">
  <div class="container">
    <span class="text-muted">© EventFinder 2021 - 2021</span>
  </div>
</footer>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>
