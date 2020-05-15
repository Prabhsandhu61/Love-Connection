<?php include 'config.php';?>
<?php
session_destroy();
header( "Location: ".$pathSite.'login.php' );
?>