<?php

$title = "Did you forget something?";

if ( $_POST ) {
  include 'db_connect.php';
  $email = mysqli_real_escape_string($db_connection, $_POST['email']);

  $query = "SELECT `id` from `users` WHERE `username` = '$email';";
  $result = mysqli_query( $db_connection, $query );

  if ( $result->{"num_rows"} ) {
    $row = mysqli_fetch_row( $result );
    $id = $row[0];
    // Build validation code
    $token = openssl_random_pseudo_bytes( 32 );
    $token = base64_encode( $token );
    $token = urlencode( $token );

    // Record the validation code in the database
    $query = "UPDATE `users` SET `resetCode` = '$token' WHERE `id` = $id;";
    $result = mysqli_query($db_connection, $query);

    // Send an email to the user
    $buildURL = "http://192.168.33.10/login_form/reset.php?user=$id&code=$token";
    mail( $email, "Please reset your password", "Thanks for signing up with us. Please visit $buildURL to complete the password reset process. Cheers.");
  }
}

// if ( isset( $_POST['email'] )

include( 'snippets/generic_header.php' );

if ( ! $_POST ) {
  include( 'snippets/forgot_body.php' );
}
else {
  include( 'snippets/thankyou_reset.php' );
}


include( 'snippets/footer.php' );