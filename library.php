<?php

function isActive() {
  if(isset($_SESSION['active']) ){
    return($_SESSION['active']);
  }
  return( false );
}

function redirect_HOME() {
  header("Location: home.php");
  exit();
}

function redirect_LOGIN() {
  header("Location: login.php");
  exit();
}

function sanitize($data) {
  $data = trim($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
}


 ?>
