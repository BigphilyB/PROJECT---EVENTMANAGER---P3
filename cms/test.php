<?php
$con = mysqli_connect("localhost", "root", "", "project_eventmanager_p3"); //Connect to database

$EventNumber = $_GET['EventNumber'];
$query = "SELECT * FROM events WHERE EventNumber=$EventNumber";
$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
if(mysqli_num_rows($result) > 0) {
  while($user = mysqli_fetch_assoc($result)) {?>
    <h1><?php echo $user['EventName'] ?></h1>
    <img src="" alt="">
    <?php
  }
}
mysqli_free_result($result);
mysqli_close($con);
?>
