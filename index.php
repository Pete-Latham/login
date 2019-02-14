<?php
  session_start();

  if ( !array_key_exists( 'loggedIn', $_SESSION ) ) {
    $_SESSION['loggedIn'] = "";
  }

  include 'db_connect.php';

  $loggedIn = false;

  if ( isset($_POST['logOut'] ) ) {
    $_SESSION['loggedIn'] = false;
    $loggedIn = false;
  }

  if ( isset( $_POST['email'] ) && isset ($_POST['password']) ) {
    $suppliedEmail = $_POST['email'];
    $suppliedEmail = mysqli_real_escape_string($db_connection, $suppliedEmail);
    $suppliedPw = $_POST['password'];

    $query = "SELECT `password`, `validationCode` FROM `users` where `username` = '$suppliedEmail';";

    $result = mysqli_query( $db_connection, $query );

    if ($result) {
      $rows = mysqli_num_rows( $result );
      if ( $rows === 1 ) {
        $row = mysqli_fetch_row( $result );
        $knownPW = $row[0];
        $valCode = $row[1];
        if ( password_verify( $suppliedPw, $knownPW ) && !$valCode ) {
          $loggedIn = true;
          $_SESSION['loggedIn'] = true;
        }
        else if ( $valCode ) {
          include( 'snippets/notVal.php' );
        }
      }
      else {
        echo "<p>Sorry, some details don't match</p>";
      }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="node_modules/normalize.css/normalize.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Login</title>
</head>
<body class="container">
<?php
  if ( $loggedIn ) {
    ?>
    <h1>Thanks for popping by!</h1>

    <form action="index.php" method="post">
      <button name="logOut" type="submit" class="btn btn-primary" formmethod="post">Logout</button>
    </form>
    <?php
  }
  else {
    ?>
    <h1>Please feel free to log in ...</h1>

    <form action="index.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else (if you're lucky).</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword">
      </div>
      <button type="submit" class="btn btn-primary" formmethod="post">Submit</button>
      <a href="sign_up.php" class="btn btn-dark">Sign Up</a>
    </form>
    <?php
  }
  ?>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>