<?php

require('./connect.php');

?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Monthly Report</title>

  <link rel="stylesheet" href="parts_report.css">

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
    <h2 style="color: white;">  Monthly Report - January (Parts)</h2>
    <hr>
    <br>

    <!-- -->
    <h3>Parts List </h3>

    <table style="width:100%">
      <tr>
        <th><b>Part Name</b> </th>
        <th><b>Quantity </b></th>
        <th><b>Bought Cost </b></th>
        <th><b>Sell Cost </b></th>
        <th><b>Order Date</b></th>

      </tr>
      <?php
      $query = "SELECT * FROM parts_history";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_assoc($result)) {
          echo ("<tr>");
          echo ("<th>" . $row["model_name"] . "</th>");
          echo ("<th>" . $row["part_quantity"]. "</th>");
          echo ("<th>". $row["boughtCost"] . "</th>");
          echo ("<th>". $row["part_sellCost"] . "</th>");
          echo ("<th>". $row["order_date"] . "</th>");
          echo ("</tr>");

        }
      }

      ?>
    </table>
    <br><br>
    <hr>
    <?php
    $query = mysqli_query($conn, "SELECT SUM(boughtCost) AS boughtCost FROM parts_history");
    $boughtCost= mysqli_fetch_assoc($query);

    $query2 = mysqli_query($conn, "SELECT SUM(part_sellCost) AS sellCost FROM parts_history");
    $sellCost= mysqli_fetch_assoc($query2);

    $profit = $sellCost['sellCost'] - $boughtCost['boughtCost'];

    echo ("<h3>Individual Total </h3>");
    echo ("<p> <b> Total BoughtCost:" . $boughtCost['boughtCost'] .  "</b> </p>");
    echo ("<p> <b> Total SellCost:" . $sellCost['sellCost'] .  "</b> </p>");
    echo ("<p> <b> Total Profit:" . $profit .  "</b> </p>");

    echo ("<br>");


    ?>


  </div>

</div>

<script src="js/scripts.js"></script>
</body>
</html>
