  <?php require 'config.php'; ?>


  <!DOCTYPE html>
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
    <div id="evenementen">
      <form action="test.php" method="post">
        <label>Event:</label>
        <select id="eventName" name="eventName">
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
        <?php
        ?>
        <br>
        <label for="ticket">Hoeveel tickets wilt u bestellen?</label>
        <div id="input_number">
          Selecteer eerst een evenement: <br>
        </div>
        <input type="submit" name="bestellen" value="bestellen" id="orderButton" />
      </form>
    </div>
    <?php
    if (isset($_POST["bestellen"])) {
      $eventName = $_POST["eventName"];
      $currentTickets = "SELECT `CurrentTickets` FROM events WHERE EventName = $eventName";
      $ticketsBought = $_POST["ticketsBought"];

      // echo $currentDate . "<br>";

      if($eventName == "" or NULL){
        die("Error: Event name can't be empty, please try again.");
      } else {
        if($ticketsBought == 0){
          die("Error: You can't buy 0 tickets, please try again, and select atleast 1 ticket.");
        }
      }

      $sql = "UPDATE `events` SET `CurrentTickets`= CurrentTickets - $ticketsBought WHERE `EventName` = '$eventName';";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      mysqli_close($conn);
    }
    ?>
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
      window.ga = function() {
        ga.q.push(arguments)
      };
      ga.q = [];
      ga.l = +new Date;
      ga('create', 'UA-XXXXX-Y', 'auto');
      ga('set', 'anonymizeIp', true);
      ga('set', 'transport', 'beacon');
      ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
  </body>
  </html>
  <?php
  $conn->close();
  ?>