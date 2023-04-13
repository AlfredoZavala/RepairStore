<?php
session_start();

define("TITLE", "Create Ticket_");

include_once('./library.php');
require('./header.php');

?>

<?php

// Checking if all fields are filled out
if (sizeof($_POST) == 5) {

  //var_dump($_POST);

  // Checking that all fields are non-empty
  if (
    $_POST['customer_name'] !== "" && $_POST['customer_phone'] !== ""
    && $_POST['device_type'] !== ""
    && $_POST['ticket_typeOfRepair'] !== "" && $_POST['ticket_dmgDesc'] !== ""
  ) {

    //alert("Goodjob!");
    //var_dump($_SESSION);

    $ticket_info = array_map('sanitize', $_POST); // sanitize
    //

    // CUSTOMER INSERT
    $cust_info = $conn->prepare("INSERT INTO Customer(customer_name, phone_num) VALUES (?, ?)");
    $cust_info->bind_param("ss", $ticket_info['customer_name'], $ticket_info['customer_phone']);

    if( $cust_info->execute() ){
      //echo("Customer data updated");
    }


    // DEVICE INSERT

    $resulted = mysqli_query($conn, "SELECT customer_ID FROM Customer ORDER BY customer_ID DESC LIMIT 1");
    $customer_id = mysqli_fetch_assoc($resulted);
    //var_dump($customer_id);

    $device_info = $conn->prepare("INSERT INTO Device(device_type, FK_customer_ID) VALUES (?,?)");
    $device_info->bind_param("ss", $ticket_info['device_type'], $customer_id['customer_ID']);

    if( $device_info->execute() ){
      //echo("Device type updated");

    }

    $query = mysqli_query($conn, "SELECT device_ID FROM Device ORDER BY device_ID DESC LIMIT 1");
    $device_ID = mysqli_fetch_assoc($query);
    //var_dump($device_ID);

    // TICEKT INSERT
    $date = date('Y-m-d');
    $repair_info = $conn->prepare("INSERT INTO Ticket(ticket_date, ticket_dmgDesc, ticket_typeOfRepair, FK_device_ID) VALUES (?, ?, ?, ?)");
    $repair_info->bind_param("ssss", $date, $ticket_info['ticket_dmgDesc'], $ticket_info['ticket_typeOfRepair'], $device_ID['device_ID']);

    if( $repair_info->execute() ){
      //echo("Repair info updated");
    }

  } else {
    echo ("Failed to create ticket");
  }


}

if( !isActive() ){
  redirect_HOME();
} else {

  ?>

  <h4>Ticket Form </h4>

  <hr><br><br>
  <div class="container" id="create_ticket">
    <form action="create_ticket.php" method="POST">

      <h5> Customer: </h5>
      <div class="row">
        <div class="col-25"><label for="customer_name">Name: </label></div>
        <div class="col-75"><input type="text" name="customer_name" id="customer_name" placeholder="FirstName LastName"value="<?= $_POST['customer_name'] ?? '' ?>"></div>
      </div>
      <div class="row">
        <div class="col-25"><label for="customer_phone">Phone #: </label></div>
        <div class="col-75"><input type="tel" id="customer_phone" name="customer_phone" placeholder="1234567890" pattern="[0-9]{3}-[0-9]{3]-[0-9]{4}" value="<?= $_POST['customer_phone'] ?? '' ?>"></div>
      </div>
      <br>

      <h5>Device: </h5>
      <div class="row">
        <div class="col-25"><label for="device_type">Device Type: </label></div>
        <div class="col-75"><input type="text" name="device_type" id="device_type" placeholder="Desktop, Laptop, Mobile..."value="<?= $_POST['device_type'] ?? '' ?>"></div>
      </div>
      <br>

      <h5>Ticket: </h5>
      <div class="row">
        <div class="col-25"><label for="ticket_typeOfRepair">Type of Repair: </label></div>
        <div class="col-75"><textarea id="ticket_typeOfRepair" name="ticket_typeOfRepair" placeholder="E.g. Screen Replacement ... " rows="5" cols="50" value=">?= $_POST['ticket_typeOfRepair'] ?? '' ?>"></textarea></div>
      </div>

      <div class="row">
        <div class="col-25"><label for="ticket_dmgDesc">Damaage Description: </label></div>
        <div class="col-75"><textarea id="ticket_dmgDesc" name="ticket_dmgDesc" placeholder="E.g. Defective screen, system turns on but the screen won't... " rows="5" cols="50" value=">?= $_POST['ticket_dmgDesc'] ?? '' ?>"></textarea></div>
      </div>
      <br>

      <div class="row">
        <input type="submit" value="Create Ticket!">
      </div>
    </form>
  </div>

<?php  } ?>


<?php require('./footer.php'); ?>
