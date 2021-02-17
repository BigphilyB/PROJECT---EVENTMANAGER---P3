<?php
    require 'config.php';
    $boolean = true;
    $currentDate = date("Y-m-d h:i:s");
    $eventName = $_POST["eventName"];
    echo $eventName . "<br>";
    echo $currentDate . "<br>";
    list($eventStartDate) = mysqli_fetch_array($conn->query("SELECT EventStartDate FROM events WHERE EventName = '$eventName';"));
    list($eventEndDate) = mysqli_fetch_array($conn->query("SELECT EventEndDate FROM events WHERE EventName = '$eventName';"));

    if($currentDate < $eventStartDate){
      $boolean = true;
      echo "This event is not live yet.";
    } if($currentDate >= $eventStartDate && $currentDate < $eventEndDate){
        echo "This event is live right now.";
        echo "<br>";
    }  if($currentDate >= $eventStartDate && $eventEndDate == NULL){
        $boolean = false;
        echo "This event doesn't have an end date.";
    } else {
      $boolean = false;
      echo "This event is no longer live.";
    }

    $ticketsBought = $_POST["ticketsBought"];
    $sql = "UPDATE `events` SET `CurrentTickets`= CurrentTickets - $ticketsBought WHERE `EventName` = '$eventName';";

    if($boolean){
      if ($conn->query($sql) === TRUE) {
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
?>