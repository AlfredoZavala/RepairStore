<?php
session_start();

define("TITLE", "Repair Queue_");

include_once('./library.php');
require('./header.php');

/*
SELECT Ticket.ticket_id, Device.device_type, Ticket.ticket_typeOfRepair, Ticket.ticket_dmgDesc, Customer.customer_name
FROM Customer, Device, Ticket
WHERE Customer.customer_ID=Device.FK_customer_ID AND Device.device_ID=Ticket.FK_device_ID AND DATE(Ticket.ticket_date)=CURDATE()
GROUP BY Ticket.ticket_id, Device.device_type, Ticket.ticket_typeOfRepair, Ticket.ticket_dmgDesc, Customer.customer_name;
*/


$query = "SELECT * FROM repair_queue";
$result = mysqli_query($conn, $query);

if (!isActive() ){
  redirect_HOME();
} else {

?>

<h4>Repair Queue !</h4>

<hr><br><br>

  <div class="container"  id="repair_queue" style="width: 100%;">
    <!-- <h3 align="">How to Use Mysql View in PHP Code</h3><br /> -->
    <h3 align="">Todays </h3><br />
    <div class="table-responsive">
      <table class="table table-striped">
        <tr>
          <th>Ticket ID</th>
          <th>Type of Device</th>
          <th>Type of Repair</th>
          <th>Damage to Device</th>
          <th>Customer</th>
        </tr>
        <?php
        while($row = mysqli_fetch_array($result))
        {
          ?>
          <tr>
            <td><?php echo $row["ticket_id"]; ?></td>
            <td><?php echo $row["device_type"]; ?></td>
            <td><?php echo $row["ticket_typeOfRepair"]; ?></td>
            <td><?php echo $row["ticket_dmgDesc"]; ?></td>
            <td><?php echo $row["customer_name"]; ?></td>
          </tr>
          <?php
        }
        ?>
      </table>
    </div>
  </div>

<?php  } ?>

<?php require('./footer.php'); ?>
