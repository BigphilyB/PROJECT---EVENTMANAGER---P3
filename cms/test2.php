<?php

include ('../config.php');

if( isset($_POST['event_update']) ) {
  $EventNumber = $_GET['EventNumber'];
  $eventnameup = $_POST['eventnameup'];
  $eventdescup  = $_POST['eventdescup']; //---------------------------------------
  $eventstartup     = $_POST['eventstartup'];
  $eventendup  = $_POST['eventendup'];
  $eventhostup     = $_POST['eventhostup'];
  $eventmaxticketsup    = $_POST['eventmaxticketsup'];
  $priceticketsup  = $_POST['priceticketsup'];
  $eventlocationup = $_POST['eventlocationup'];
  $imgup = $_FILES['imgup']['name'];

  $target = "../img/event_img/" . basename($_FILES['imgup']['name']);

  $query  = "UPDATE `events` SET EventName='$eventnameup', EventDiscription='$eventdescup', EventStartDate='$eventstartup', EventEndDate ='$eventendup ', EventHost='$eventhostup',  CurrentTickets='$eventmaxticketsup', TicketPrice='$priceticketsup', EventLocation='$eventlocationup', EventImg='$imgup', WHERE EventNumber=$EventNumber";
  $result = mysqli_query($conn, $query) or die('Cannot update data in database. '.mysqli_error($conn));
  $user   = mysqli_close($conn);
  //if($result) header('Location: events.php');


}

?>
