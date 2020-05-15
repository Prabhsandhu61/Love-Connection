<?php
$databaseHost = 'localhost';
$databaseName = 'loveconnectiondb';
$databaseUsername = 'root';
$databasePassword = '';
$pathSite='http://localhost/project/';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
ini_set('memory_limit','-1');
session_start();
?>
