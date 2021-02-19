<?php
$servername = "localhost";
$username = "u200527_event";
$password = "^AME%Fk8BXpb";
$dbname = "u200527_event";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
