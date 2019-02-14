<?php

include( 'db_connect.php' );
include( 'snippets/validate_header.php');

if ( $_GET ) {

  $userNumber = $_GET['user'];
  $validCode = $_GET['code'];

  $query = "SELECT `validationCode` FROM `users` WHERE `id` = '$userNumber';";
  $result = mysqli_query( $db_connection, $query );

  $rows = mysqli_num_rows( $result );
  if ( $rows === 1 ) {
    $row = mysqli_fetch_row( $result );
    $knownCode = urldecode( $row[0] );
    if ( $knownCode === $validCode ) {
      $query = "UPDATE `users` SET `validationCode` = NULL, `validated` = NOW() WHERE `id` = '$userNumber';";
      $result = mysqli_query( $db_connection, $query );
      include( 'snippets/validate_success.php' );
    }
  }
  include( 'snippets/footer.php' );
}