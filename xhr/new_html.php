<?php
require_once('../config.php');

$activiteitID = $_GET['id'];

list($amountOfTickets) = mysqli_fetch_array($conn->query("SELECT CurrentTickets FROM events WHERE EventName = '{$activiteitID}' LIMIT 1;"));

echo '<input type="number" id="ticket" name="ticketsBought" min="0" max="'.$amountOfTickets .'">';
echo '<input type="submit" name="bestellen" value="bestellen" id="orderButton" />';