<?php
session_start();

define("TITLE", "Repair Queue_");

include_once('./library.php');
require('./header.php');

if (!isActive() ){
  redirect_HOME();
} else {

?>

<h4>Report Generator !</h4>

<hr><br><br>

  <div class="container"  id="report_generator" style="width: 100%;">

  <form action="monthly_report.php" method="POST">
    <input type="submit" value="January - Gross Income Report">
  </form>
  <br>
  <form action="parts_report.php" method="POST">
    <input type="submit" value="January - Parts Ordered Report">
  </form>

  </div>

<?php  } ?>

<?php require('./footer.php'); ?>
