<?php
session_start();

define("TITLE", "Index_");

include_once('./library.php');
require('./header.php');

?>

<?php
if (isActive()) {
?>
        <?php echo "<h4>Welcome, $_SESSION[user] !</h4>" ?>
        </hr><br>

<?php
} else {
?>
        <h4>Welcome, Guest!</h4>
        <hr> <br>
    <!--  -->
        <div class="container" id="pricing01">
          <p>Desktop Repair<p>
            <hr>
            <p> 1 Hour </p>
            <p> $19.99 </p>
        </div>

        <br>
        <div class="container"id="pricing02">
          <p>Laptop Repair<p>
            <hr>
            <p> 1 Hour </p>
            <p> $19.99 </p>
        </div>

        <div class="container"id="pricing02">
          <p>Mobile Repair<p>
            <hr>
            <p> 1 Hour </p>
            <p> $19.99 </p>
        </div>



<?php
}
?>




<?php require('./footer.php'); ?>
