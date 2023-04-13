<?php

include_once('./library.php');
if (isActive()) {

?>
<!-- START __ NAVBAR -->

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">RE:PAIR</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" style="color: #ed1842;" href="./logout.php">Sign out</a>
    </li>
  </ul>
</nav>
<!-- END __ NAVBAR -->

<?php } else { ?>

  <div id="navbar" >
    <nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">RE:PAIR</a>
      <input class="form-control form-control-dark w-100" type="" placeholder="" aria-label="">
      <ul class="navbar-nav px-3"style="background: grey;">
        <li class="nav-item text-nowrap" >
          <a class="nav-link" style="color: white; " href="./login.php">Sign In</a>
        </li>
      </ul>
    </nav>
  </div>


<?php } ?>
