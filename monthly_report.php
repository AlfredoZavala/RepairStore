<?php

require('./connect.php');

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Monthly Report</title>

  <link rel="stylesheet" href="monthly_report.css">

</head>
</body>
<div class="container" id="page" >
  <div class="grid-container">
    <div class="grid-child" id="shop_inf">
      <h4> RE:PAIR, INC. </h4>
      <h4> 2916 Repair Avenue </h4>
      <h4> Bakersfield, CA 93309 </h4>
      <h4> (661) 557 - 5999 </h4>

    </div>

    <div class="grid-child" id="generated_on">
      <p>Report genereated on <?php  $date = date('Y-m-d'); echo($date)?> </p>
      <img src="./images/computer_logo_2.png" alt="computer_logo" id="computer_logo">
    </div>
  </div>

  <div class="container" id="report">
    <h2 style="color: white;">  Monthly Report - January (Gross Income)</h2>
    <hr>
    <br>

    <!-- -->
    <h3>Desktops </h3>

    <table style="width:100%">
      <tr>
        <th><b>Ticket ID</b> </th>
        <th><b>Device Type </b></th>
        <th><b>Payment Amount </b></th>
      </tr>
      <?php
      $query = "SELECT * FROM Jan2020_Wk01_Desktop";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_assoc($result)) {
          echo ("<tr>");
          echo ("<th>" . $row["ticket_ID"] . "</th>");
          echo ("<th>" . $row["device_type"]. "</th>");
          echo ("<th>". $row["payment_amount"] . "</th>");
          echo ("</tr>");

        }
      }

      ?>
    </table>
    <br><br>
    <hr>
    <?php
    $query2 = mysqli_query($conn, "SELECT SUM(payment_amount) AS JanWeek01_DesktopTotal FROM Jan2020_Wk01_Desktop");
    $desktop_total = mysqli_fetch_assoc($query2);
    echo ("<p> <b> Total:" . $desktop_total['JanWeek01_DesktopTotal'] .  "</b> </p>");
    ?>

    <!-- -->
    <h3>Laptops </h3>

    <table style="width:100%">
      <tr>
        <th><b>Ticket ID</b> </th>
        <th><b>Device Type </b></th>
        <th><b>Payment Amount </b></th>
      </tr>
      <?php
      $query = "SELECT * FROM Jan2020_Wk01_Laptop";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_assoc($result)) {
          echo ("<tr>");
          echo ("<th>" . $row["ticket_ID"] . "</th>");
          echo ("<th>" . $row["device_type"]. "</th>");
          echo ("<th>". $row["payment_amount"] . "</th>");
          echo ("</tr>");

        }
      }

      ?>
    </table>
    <br><br>
    <hr>
    <?php
    $query3 = mysqli_query($conn, "SELECT SUM(payment_amount) AS JanWeek01_LaptopTotal FROM Jan2020_Wk01_Laptop");
    $laptop_total = mysqli_fetch_assoc($query3);
    echo ("<p> <b> Total:" . $laptop_total['JanWeek01_LaptopTotal'] .  "</b> </p>");
    ?>

    <!-- -->

    <h3>Mobile </h3>

    <table style="width:100%">
      <tr>
        <th><b>Ticket ID</b> </th>
        <th><b>Device Type </b></th>
        <th><b>Payment Amount </b></th>
      </tr>
      <?php
      $query = "SELECT * FROM Jan2020_Wk01_Mobile";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_assoc($result)) {
          echo ("<tr>");
          echo ("<th>" . $row["ticket_ID"] . "</th>");
          echo ("<th>" . $row["device_type"]. "</th>");
          echo ("<th>". $row["payment_amount"] . "</th>");
          echo ("</tr>");

        }
      }

      ?>
    </table>
    <br><br>
    <hr>
    <?php
    $query4 = mysqli_query($conn, "SELECT SUM(payment_amount) AS JanWeek01_MobileTotal FROM Jan2020_Wk01_Mobile");
    $mobile_total = mysqli_fetch_assoc($query4);
    echo ("<p> <b> Total:" . $mobile_total['JanWeek01_MobileTotal'] .  "</b> </p>");
    ?>

    <!-- -->
    <h3> Gross Income </h3>
    <?php
    $sum = $desktop_total['JanWeek01_DesktopTotal'] + $laptop_total['JanWeek01_LaptopTotal'] + $mobile_total['JanWeek01_MobileTotal'];
    echo ("<p><b> Total: " . $sum . "</b></p>");
    ?>

  </div>

</div>

<script src="js/scripts.js"></script>
</body>
</html>
