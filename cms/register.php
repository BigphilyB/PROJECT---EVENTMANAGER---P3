<?php

require ('../config.php');

if( isset($_POST['register_acc_submit']) ) {
  $username = mysqli_real_escape_string($conn, trim($_POST['username']));
  $password  = mysqli_real_escape_string($conn, trim($_POST['password']));
  // Get current datetime
  $dt = new DateTime(null, new DateTimeZone('Europe/Amsterdam'));
  $datetime = $dt->format('d-m-Y H:i:s');
  // Keep track of validated values
  $valid = array('username'=>false, 'password'=>false);

  // Validate username
  if( !empty($username) ) {
    if( strlen($username) >= 2 && strlen($username) <= 16 ) {
      if( !preg_match('/[^a-zA-Z\d_.]/', $username) ) {
        $valid['username'] = true;
        echo 'Username is OK! <br/>';
      }else{
        echo 'Username can contain only letters!<br/>';
      }
    }else{
      echo 'Username must be between 2 and 16 characters long!<br/>';
    }
  }else{
    echo 'Username cannot be blank!<br/>';
  }
  // Validate password
  if( !empty($password) ) {
    if( strlen($password) >= 5 && strlen($password) <= 32 ) {
      $valid['password'] = true;
      $password = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
      echo 'Password is OK!<br/>';
    }else{
      echo 'Password must be between 5 and 32 characters!<br/>';
    }
  }else{
    echo 'Password cannot be blank!<br/>';
  }
  if($valid['username'] && $valid['password']) {
    $query = "INSERT INTO `adminlogin` (`username`, `password`) VALUES ('$username','$password')";
    $result = mysqli_query($conn, $query) or die('Cannot insert data into database. '.mysqli_error($con));
    if($result) {
      echo 'Data inserted into database.';
      $user   = mysqli_close($conn);
    }
  }
}


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<form name='signup' id='signup' action='register.php' method='post'>
  <div class='form-group'>
    <label for='username'>Username</label>
    <input name='username' id='username' type='text' class='form-control' placeholder='username' style='cursor:text; background-color:#fff;' onfocus='this.removeAttribute("readonly");' readonly required />
  </div>
  <div class='form-group'>
    <label for='password'>Password</label>
    <input name='password' id='password' type='password' class='form-control' placeholder='password' style='cursor:text; background-color:#fff;' onfocus='this.removeAttribute("readonly");' readonly required />
  </div>
  <div class='form-group'>
    <button name='register_acc_submit' id='register_acc_submit' class='btn btn-primary btn-block'>Sign Up</button>
  </div>
</form>
</body>
</html>
