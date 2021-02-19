<?php
    require '../config.php';

    $eventName = $_POST["eventName"];
    $cName = $_POST["name"];
    $cEmail = $_POST["email"];
    $cPhonenumber = $_POST["phonenumber"];
    $cZipcode = $_POST["zipcode"];
    $cAdress = $_POST["adress"];
    $cCity = $_POST["city"];
    $cDob = $_POST["dob"];
    $cTickets = $_POST["ticketsBought"];

    $conn = mysqli_connect("localhost", "u200527_event", "^AME%Fk8BXpb", "u200527_event"); //Connect to database

    $boolean = true;
    $currentDate = date("Y-m-d h:i:s");
    list($eventStartDate) = mysqli_fetch_array($conn->query("SELECT EventStartDate FROM events WHERE EventName = '$eventName';"));
    list($eventEndDate) = mysqli_fetch_array($conn->query("SELECT EventEndDate FROM events WHERE EventName = '$eventName';"));


    if($currentDate < $eventStartDate){
      $boolean = true;
    } elseif($currentDate >= $eventStartDate && $currentDate < $eventEndDate){
        echo "This event is live right now.";
        echo "<br>";
    }  elseif($currentDate >= $eventStartDate && $eventEndDate == NULL){
        $boolean = false;
        echo "This event doesn't have an end date.";
    } else {
      $boolean = false;
      echo "This event is no longer live.";
    }

    $ticketsBought = $_POST["ticketsBought"];
    $update = "UPDATE `events` SET `CurrentTickets`= CurrentTickets - $ticketsBought WHERE `EventName` = '$eventName';";
    $insert = "INSERT INTO `clients`(`Name`, `Email`, `PhoneNumber`, `ZipCode`, `Adress`, `City`, `BirthDay`, `BoughtTickets`, `EventName`) VALUES ('$cName', '$cEmail', '$cPhonenumber', '$cZipcode', '$cAdress', '$cCity', '$cDob', '$cTickets', '$eventName')";



    if($boolean){
      if ($conn->query($update) === TRUE) {
      } else {
        echo "Error: " . $update . "<br>" . $conn->error;

      }
      if ($conn->query($insert) === TRUE) {
        $ClientID = $conn->insert_id;
        header('Location:../invoice.php?ClientID='.$ClientID);
      } else {
        echo "Error: " . $insert . "<br>" . $conn->error;
      }
    }
?>
