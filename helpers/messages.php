<?php

function getMessages() {
  $messageList = [];
  if ( isset( $_SESSION["messageList"] ) ) {
    $messageList = $_SESSION["messageList"];
    $_SESSION["messageList"] = [];         // Empty the list, idiot!!
  }
  return $messageList;
}

function addMessage( $text, $severity = 'success' ) {
  if ( !isset( $_SESSION['messageList'] ) ) $_SESSION['messageList'] = [];
  array_push($_SESSION['messageList'], [
		'text' => $text,
		'severity' => $severity                // Do we need to validate $severity?
	]);
}

?>