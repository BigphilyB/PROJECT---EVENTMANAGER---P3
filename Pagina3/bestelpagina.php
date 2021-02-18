<!DOCTYPE html>
<html>
<?php
require '../config.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Google-Style-Text-Input.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Navbar.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
</head>

<body>
    <div>
        <div class="header-blue" style="height: 600px;">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="padding: 0px;height: 40px;background: #5b5882;text-align: justify;">
                <div class="container-fluid"><button class="navbar-toggler" data-toggle="collapse"></button>
                    <nav class="navbar navbar-light navbar-expand-md">
                        <div class="container-fluid"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navcol-1">
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item"><a class="nav-link text-right" href="../Pagina1/MainDashboard.php">HOME</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">SHOP</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </nav><img class="img-fluid" src="assets/img/canon-get-inspired-10-tips-festival-photography-5-1920x1080.jpeg" style="width: 1901px;height: 600px;">
        </div>
    </div>
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-xl-8 offset-xl-0 align-self-center mx-auto" style="width: 100%;height: 950px;">
            <form action="../test.php" method="post">
                <label for="name">Name:</label><input type="text" name="name" id="name" style="width: 300px;">
                <br>
                <label for="name">Lastname:</label><input type="text" name="lastname" id="lastname" style="width: 300px;">
                <br>
                <label for="email">Email:</label><input type="email" name="email" id="email" style="width: 300px;">
                <br>
                <label for="phonenumber">Phonenumber:</label><input type="tel" name="phonenumber" id="phonenumber" style="width: 300px;">
                <br>
                <label for="zipcode">Zipcode:</label><input type="text" name="zipcode" id="zipcode" style="width: 300px;">
                <br>
                <label for="adress">Adress:</label><input type="text" name="adress" id="adress" style="width: 300px;">
                <br>
                <label for="city">City:</label><input type="text" name="city" id="city" style="width: 300px;">
                <br>
                <label for="dob">Date of Birth:</label><input type="date" name="dob" id="dob" style="width: 300px;">
                <br>
                <label for="eventName">Event:</label>
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
                <br>
                <label for="ticket">Hoeveel tickets wilt u bestellen?</label>
                <div id="input_number">
                    Selecteer eerst een evenement: <br>
                </div>
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </section>
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto h-100 text-center text-lg-left">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#">About</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Contact</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Terms of &nbsp;Use</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">© Brand 2021. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 my-auto h-100 text-center text-lg-right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#"></a></li>
                        <li class="list-inline-item"><a href="#"></a></li>
                        <li class="list-inline-item"><a href="#"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Navbar---Color-Change-on-Scroll.js"></script>
    <script src="../js/main.js"></script>
</body>
<?php
if (isset($_POST["submit"])) {
    $eventName = $_POST["eventName"];
    $currentTickets = "SELECT `CurrentTickets` FROM events WHERE EventName = $eventName";
    $cTickets = $_POST["ticketsBought"];


    if ($eventName == "" or NULL) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        if ($cTickets == 0) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $sql = "UPDATE `events` SET `CurrentTickets`= CurrentTickets - $cTickets WHERE `EventName` = '$eventName';";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}
?>

</html>
<?php
$conn->close();
?>