<?php
    require '../config.php';

    $eventName = $_POST["eventName"];
    $cName = $_POST["name"];
    $cLastName = $_POST["lastname"];
    $cEmail = $_POST["email"];
    $cPhonenumber = $_POST["phonenumber"];
    $cZipcode = $_POST["zipcode"];
    $cAdress = $_POST["adress"];
    $cCity = $_POST["city"];
    $cDob = $_POST["dob"];
    $cTickets = $_POST["ticketsBought"];

  //   if(isset($_POST["submit"])) {


  //     if ($conn->connect_error) {
  //         die("Connection failed: " . $conn->connect_error);
  //     }

  //     $sql = "INSERT INTO `clients`(`Name`, `Email`, `PhoneNumber`, `ZipCode`, `Adress`, `City`, `BirthDay`, `BoughtTickets`, `EventName`) VALUES ('$cName', '$cEmail', '$cPhonenumber', '$cZipcode', '$cAdress', '$cCity', '$cDob', '$cTickets', '$eventName')";

  //     if ($conn->query($sql) === TRUE) {
  //         echo "New record created successfully";
  //     } else {
  //         echo "Error: " . $sql . "<br>" . $conn->error;
  //     }

  //     mysqli_close($conn);
  // }
    $conn = mysqli_connect("localhost", "root", "", "project_eventmanager_p3"); //Connect to database

    $boolean = true;
    $currentDate = date("Y-m-d h:i:s");
    echo $eventName . "<br>";
    echo $currentDate . "<br>";
    $ClientID = $conn->insert_id;
    header('Location:../invoice.php?ClientID='.$ClientID);
    list($eventStartDate) = mysqli_fetch_array($conn->query("SELECT EventStartDate FROM events WHERE EventName = '$eventName';"));
    list($eventEndDate) = mysqli_fetch_array($conn->query("SELECT EventEndDate FROM events WHERE EventName = '$eventName';"));

    if($currentDate < $eventStartDate){
      $boolean = true;
      echo "This event is not live yet.";
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
    echo ($insert);

    if($boolean){
      if ($conn->query($update) === TRUE) {
      } else {
        echo "Error: " . $update . "<br>" . $conn->error;
      }
      if ($conn->query($insert) === TRUE) {
      } else {
        echo "Error: " . $insert . "<br>" . $conn->error;
      }
    }
?>
