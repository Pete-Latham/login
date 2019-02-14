<?php

include( 'db_connect.php' );

include( 'snippets/signup_header.php' );

if ( $_POST ) {

  if ( $_POST['password1'] !== $_POST['password2'] ) {
    include( 'snippets/signup_error.php' );
    include( 'snippets/signup_form.php' );
  }
  else {
    $hashed_password = password_hash( $_POST['password1'], PASSWORD_DEFAULT );

    $clean_email = mysqli_real_escape_string($db_connection, $_POST['email']);
    $clean_name = mysqli_real_escape_string($db_connection, $_POST['name']);
    $clean_surname = mysqli_real_escape_string($db_connection, $_POST['surname']);

    $token = openssl_random_pseudo_bytes( 32 );
    $token = base64_encode( $token );
    $token = urlencode( $token );

    $query = "INSERT INTO `users` ( `username`, `firstName`, `surname`, `password`, `validationCode` )
              VALUES ('$clean_email', '$clean_name', '$clean_surname', '$hashed_password', '$token' );";
    $result = mysqli_query($db_connection, $query);
    $userCreated = mysqli_insert_id($db_connection);

    include( 'snippets/thankyou_prevalidate.php' );

    $buildURL = "http://192.168.33.10/login_form/validate.php?user=$userCreated&code=$token";

    mail( $clean_email, "Please validate", "Thanks for signing up with us. Please visit $buildURL to complete the validation process. Ta.");
  }

  }
  else {
    include( 'snippets/signup_form.php');
}

include( 'snippets/footer.php' );
?>