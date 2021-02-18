<?php
$con = mysqli_connect("localhost", "root", "", "project_eventmanager_p3"); //Connect to database

$EventName = $_GET['EventName'];
$query = "SELECT * FROM events WHERE EventName=$EventName";
$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
if(mysqli_num_rows($result) > 0) {
  while($user = mysqli_fetch_assoc($result)) {?>
    <h1><?php echo $user['EventName'] ?></h1>
    <p><?php echo $user['EventDiscription']?></p>
    <img src="" alt="">
    <?php
  }

}
list($eventEndDate) = mysqli_fetch_array($con->query("SELECT EventEndDate FROM events WHERE EventNumber = '$EventName'"));
list($eventStartDate) = mysqli_fetch_array($con->query("SELECT EventStartDate FROM events WHERE EventNumber = '$EventName'"));
//echo 'Date And Time';
//$currentDate = date("Y-m-d h:i:s");
//if($currentDate < $eventStartDate) {
//  echo "This Event Isn't Started Yet!";
//}if ($currentDate >= $eventStartDate && $currentDate < $eventEndDate){
//  echo "Event Live Now!";
//}if ($currentDate > $eventStartDate && $eventEndDate) {
//  echo "Event Ended";
//}

$currentDate = date("Y-m-d");
if($currentDate < $eventStartDate) {
  echo "This Event Isn't Started Yet!";
}if ($currentDate >= $eventStartDate && $currentDate < $eventEndDate){
  echo "Event Live Now!";
}if ($currentDate > $eventStartDate && $eventEndDate) {
  echo "Event Ended";
}
mysqli_free_result($result);
mysqli_close($con);
?>
