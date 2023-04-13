
<?php

// Set up mySQL connection
$host       = 'localhost';
$user       = 'azavala';
$password   = 'Bmik7mikv';
$database   = 'azavala';

$conn       = new mysqli( $host, $user, $password, $database );

if ( $conn->connect_errno ) {
    die ("Connection Failed: { $conn->connect_error}\n");
}

//echo "Connection Established. <br>";

?>
