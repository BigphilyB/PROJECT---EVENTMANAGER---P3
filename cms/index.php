<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: dashboard.php");
  exit;
}


$conn = mysqli_connect("localhost", "u200527_event", "^AME%Fk8BXpb", "u200527_event"); //Connect to database

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Check if username is empty
  if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
  } else{
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
  } else{
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if(empty($username_err) && empty($password_err)){
    // Prepare a select statement
    $sql = "SELECT id, username, password FROM adminlogin WHERE username = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) == 1){
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if(mysqli_stmt_fetch($stmt)){
            if(password_verify($password, $hashed_password)){
              // Password is correct, so start a new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              // Redirect user to welcome page
              header("location: dashboard.php");
            } else{
              // Display an error message if password is not valid
              $password_err = "The password you entered was not valid.";
            }
          }
        } else{
          // Display an error message if username doesn't exist
          $username_err = "No account found with that username.";
        }
      } else{
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Close connection
  mysqli_close($conn);
}
?>


<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="csmslogin.css">
  <title>EventFinder || Login</title>
</head>
<body>
<?php require ('../php/navbar.php')?>
<div class="container d-flex justify-content-center">
  <div class="row my-5">
    <div class="col-md-6 text-left text-white lcol">
      <div class="greeting">
        <h3>Welcome to <span class="txt">EventFinder</span></h3>
      </div>
      <h6 class="mt-3">let's light some fire and get the show on the road...</h6>
    </div>
    <div class="col-md-6 rcol">
      <form method="POST" action="index.php"multipart/form-data">
      <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <h4>Username</h4>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        <span class="help-block"><?php echo $username_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <h4>Password</h4>
        <input type="password" name="password" class="form-control">
        <span class="help-block"><?php echo $password_err; ?></span>
      </div>
      <a class="text-dark text-decoration-none" href="../index.html">Go Back </a>
      <div class="form-group">
        <button type="submit"  value="Login" name="submit" class="btn btn-success mt-5">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>
</html>
