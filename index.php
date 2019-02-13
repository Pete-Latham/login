<?php

  $KNOWN_EMAIL = "root@root.com";
  $KNOWN_PW = "root";
  $loggedIn = false;

  // echo "<pre>";
  // var_dump( $_POST );
  // echo "</pre>";

  if ( $_POST ) {
    $email = $_POST['email'];
    $pw = $_POST['password'];
    if ( $email === $KNOWN_EMAIL && $pw === $KNOWN_PW ) {
      $loggedIn = true;
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
    </form>
    <?php
  }
  ?>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>