<?php

include_once('./library.php');
require_once('./connect.php');
define("IMG_DIR", "images/");

 ?>

 <!DOCTYPE html>

 <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title> <?php define("TITLE", ""); echo TITLE; ?> </title>

      <!-- Bootstrap core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="./dashboard.css" rel="stylesheet">
        <link href="./project03.css" rel="stylesheet">
    </head>

    <body>
      <?php
      if( !isActive() ) {
        require_once('./navbar.php');
      } else {
        require_once('./navbar.php'); 
        require_once('./sidebar.php');
      }
        ?>


      <!-- START CONTENT -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
