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
</head>

<body>
    <div>
        <div class="header-blue" style="height: 600px;">
            <nav class="navbar navbar-light navbar-expand-md" style="background: #5b5882;height: 40px;">
                <div class="container-fluid"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="MainDashboard">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="../Pagina4/InlogPage.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav><img class="img-fluid" src="assets/img/canon-get-inspired-10-tips-festival-photography-5-1920x1080.jpeg" style="width: 1901px;height: 600px;">
        </div>
    </div>
    <section class="features-icons bg-light text-center" style="height: 850px;">
        <div class="container">
            <div class="row">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "project_eventmanager_p3"); //Connect to database
                $query = "SELECT * FROM `events`";
                $result = mysqli_query($conn, $query) or die('Cannot fetch data from database. ' . mysqli_error($conn));
                    while ($user = mysqli_fetch_assoc($result)) {?>

                        <div class="col-lg-2">
                            <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                                <a href="../Pagina2/DetailPagina.php?EventNumber=<?php echo $user['EventNumber'] ?>">
                                    <div class="d-flex features-icons-icon" style="/*width: 100%;*/"><img src="../img/event_img/<?php echo $user['EventImg'] ?>" style="width: 160px;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>
                                    <h5 class="text-danger"><?php echo $user['EventStartDate'] ?></h5>
                                    <p class="lead text-left mb-0"><?php echo $user['EventName'] ?></p>
                                    <p class="lead text-left mb-0"><?php echo $user['EventLocation'] ?></p>
                                </a>
                            </div>
                        </div>

                    <?php
                }
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>


            </div>
        </div>
    </section>
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto h-100 text-center text-lg-left">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="About">About</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="Contact">Contact</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="Terms">Terms of &nbsp;Use</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="Privacy">Privacy Policy</a></li>
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