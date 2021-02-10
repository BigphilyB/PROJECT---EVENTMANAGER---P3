  
  <?php require 'config.php'; ?>


<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  
  
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
<h1> </h1>
<button id="OrderButton">Bestellen</button>


<form action="" method="post">
    <label for="">name</label>
    <input type="text" id="ClientName" placeholder="Naam"/> <br>
    <label for="">Emai</label>
    <input type="email" name="Email" id="ClientEmail" placeholder="Email">
    <label for="">PhoneNumber</label>
    <input type="phonenumber" name="Phonenumber" id="ClientPhoneNumber" placeholder="Phonenumber">
    <label for="">Zip code</label>
    <input id="ZipCode" name="zip" type="text" inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$">    
    <label for="">Adress</label>
    <input type="text" name="Adress" id="ClientAdress" placeholder="Adress">
    <label for="">City</label>
    <input type="text" name="City" id="ClientCity" placeholder="City">
    <label for="">Birthday</label>
    <input type="date" name="Birthday" id="ClientBirthday" placeholder="Birthday">
    
    <label>Event:</label>
    <select id="eventName" name="eventName">
      <?php 
        $sql = "SELECT EventName FROM events";
        if ($result = $conn->query($sql)) {
          while ($row = $result->fetch_assoc()) {
            echo "<option>" . $row['EventName'] . "</option>";
          }
        }
      ?>
    </select>
    <!-- <input type="text" id="eventName" name="eventName"/> -->
    <label for="ticket">Hoeveel tickets wilt u bestellen?</label>
    <?php
    ?>
    <input type="number" id="ticket" name="ticketsBought" min="0" max="500">
    <input type="submit" name="bestellen" value="bestellen" id="orderButton"/>
</form>


<?php

if(isset($_POST["bestellen"])) {
  $eventName = $_POST["eventName"];
  $currentTickets = "SELECT `CurrentTickets` FROM events WHERE EventName = $eventName";
  $ticketsBought = $_POST["ticketsBought"];

  
  $sql = "UPDATE `events` SET `CurrentTickets`= CurrentTickets - $ticketsBought WHERE `EventName` = '$eventName';";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  mysqli_close($conn);
}
?>

  <!-- Add your site or application content here -->
  <p>Hello world! This is HTML5 Boilerplate.</p>
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
