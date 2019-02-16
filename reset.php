<?php
session_start();

$title = "Password reset";
include( 'helpers/db_connect.php' );
include( 'snippets/generic_header.php' );

if ( $_GET ) {
  $userNumber = ( $_GET['user'] );
  $resetCode = ( $_GET['code'] );
  $resetCode = urlencode( $resetCode );

  if ( $userNumber && $resetCode ) {
    $query = "SELECT `id` FROM `users` WHERE `id` = '$userNumber' AND `resetCode` = '$resetCode';";
    $result = mysqli_query( $db_connection, $query );
    $row = mysqli_fetch_row( $result );

    if ( $result->{'num_rows'} == 1 ) {
      $_SESSION['resetUser'] = $userNumber;
      include( 'snippets/reset_form.php' );
    }
    else {
      echo "User not found, sorry";
    }
  }
}

if ( $_POST ) {
  if ( $_POST['password1'] == $_POST['password2'] ) {
    $id = $_SESSION['resetUser'];
    $hashed_password = password_hash( $_POST['password1'], PASSWORD_DEFAULT );

    $query = "UPDATE `users` SET `password` = '$hashed_password', `resetCode` = NULL WHERE `id` = '$id';";
    $result = mysqli_query($db_connection, $query);
    if ( mysqli_affected_rows( $result) == 1 ) {
      include( 'snippets/reset_good.php' );
    }
    else {
      include( 'snippets/reset_oops.php' );
    }
  }

}

include( 'snippets/footer.php' );
?>