<?php

session_start();

include('header.php');

session_unset();
session_destroy();

header("Location: home.php");
exit;

require('./footer.php');
?>
