<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="node_modules/normalize.css/normalize.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title><?php echo $title ?></title>
</head>
<body class="container">

<?php
  $messageList = getMessages();
  if ( !empty( $messageList ) ) {
?>
<section class="messageList">
    <ul class="list-unstyled">
<?php
    foreach( $messageList as $message ) {
?>
      <li class="alert alert-<?php echo $message['severity']?>"><?php echo $message['text']?></li>
<?php
    }
?>
    </ul>
  </section>

<?php
}
?>
