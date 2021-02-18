<?php require '../config.php'; ?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
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
                                    <!-- <li class="nav-item"><a class="nav-link" href="#">SHOP</a></li> -->
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
                <div class="col-lg-3 col-xl-3 offset-lg-0 offset-xl-0" style="width: 500px;">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><img class="img-fluid" src="../img/event_img/<?php echo $user['EventImg'] ?>" style="width: 350px;height: 160px;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>

                        <?php
                        $EventNumber = $_GET['EventNumber'];

                        $sql = "SELECT EventName, EventImg, EventNumber, EventDiscription, EventStartDate, EventEndDate, EventHost, EventCreateDate, CurrentTickets, TicketPrice, EventLocation FROM events WHERE EventNumber = $EventNumber";

                        $result_array = array();

                        if ($result = $conn->query($sql)) {
                            $event = $result->fetch_assoc();

                            // while ($row = $result->fetch_assoc()) {
                            //     // echo var_dump($row);
                            //     array_push($result_array, $row);
                            // }
                        }

                        // <?php echo $result_array[0]["EventName"];
                        ?>

                        <!-- ?> -->

                    </div>
                    <h5 class="text-danger"><strong><?php echo $event["EventName"]; ?></strong></h5>
                    <h5 class="text-danger"><strong><?php echo $event["EventHost"]; ?></strong></h5>
                    <p class="lead text-left mb-0" style="width: 250px;">Tickets left: <?php echo $event["CurrentTickets"]; ?></p>
                    <p class="lead text-left mb-0" style="width: 250px;">Event starts on: <?php echo $event["EventStartDate"]; ?></p>
                    <p class="lead text-left mb-0" style="width: 250px;">Event ends: <?php echo $event["EventLocation"]; ?></p>
                    <p class="lead text-left mb-0" style="width: 250px;">€ <?php echo $event["EventLocation"]; ?></p>


                </div>
                <div class="col-xl-8 offset-xl-0" style="width: 800px;height: 700px;">
                    <p class="lead text-left mb-0" style="width: 100%;"><strong>&nbsp;<?php echo $event["EventDiscription"]; ?></strong></p><a class="btn btn-light action-button" role="button" href="#" style="color: #1f2021;background: var(--blue);border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;width: 200px;height: 50px;border-width: 1px;border-style: solid;">Order</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <footer class="footer bg-light" style="margin-top: 50px;">
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
</body>

</html>