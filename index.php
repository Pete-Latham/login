<?php
  session_start();

  $title = "Welcome!";

  if ( !array_key_exists( 'loggedIn', $_SESSION ) ) {
    $_SESSION['loggedIn'] = "";
  }

  if ( !array_key_exists( 'rememberedUser', $_SESSION ) ) {
    $_SESSION['rememberedUser'] = "";
  }

  $rememberedUser=$_SESSION['rememberedUser'];

  include_once( 'helpers/db_connect.php' );
  include_once( 'helpers/messages.php' );

  $loggedIn = false;

  if ( isset($_POST['logOut'] ) ) {
    addMessage( "Sorry to see you go", "info" );
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
          addMessage( "Welcome to the site" );
          if ( isset( $_POST['remember'] ) ) {
            $_SESSION['rememberedUser'] = $suppliedEmail;
            $rememberedUser = $suppliedEmail;
          }
          else {
            $_SESSION['rememberedUser'] = "";
            $rememberedUser = "";
          }
        }
        else if ( $valCode ) {
          include( 'snippets/notVal.php' );
          addMessage( "Sorry, we weren't able to log you in", "danger" );
        }
        else {
          addMessage( "Sorry, we weren't able to log you in", "danger" );
        }
      }
      else {
        addMessage( "Sorry, we weren't able to log you in", "danger" );
      }
    }
  }

  include( 'snippets/generic_header.php' );
  if ( $loggedIn ) {
    include( 'snippets/main_page.php' );
  }
  else {
    include( 'snippets/login_form.php' );
  }

  include( 'snippets/footer.php' );
?>