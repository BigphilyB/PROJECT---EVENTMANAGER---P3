<?php
// if (isset($_POST["bestellen"])) {
    require 'config.php';
      $currentDate = date("Y-m-d h:i:s");
      $eventName = $_POST["eventName"];
      echo $eventName . "<br>";
      list($eventStartDate) = mysqli_fetch_array($conn->query("SELECT EventStartDate FROM events WHERE EventName = '$eventName';"));
      list($eventEndDate) = mysqli_fetch_array($conn->query("SELECT EventEndDate FROM events WHERE EventName = '$eventName';"));
    //   echo "Start Date: " .$eventStartDate . "<br>";
    //   echo "End Date: " .$eventEndDate . "<br>";
    //   echo "Current Date: " . $currentDate . "<br>";
    // }
    if($currentDate < $eventStartDate){
        echo "This event hasn't started yet.";
        echo "<br>";
    } if($currentDate >= $eventStartDate && $currentDate < $eventEndDate){
        echo "This event is live right now.";
        echo "<br>";
    } if($currentDate > $eventEndDate) {
        echo "This event already happened.";
        echo "<br>";
    }

    $ticketsBought = $_POST["ticketsBought"];
    $sql = "UPDATE `events` SET `CurrentTickets`= CurrentTickets - $ticketsBought WHERE `EventName` = '$eventName';";

    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>