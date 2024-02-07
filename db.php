<?php
$host = 'sql307.thsite.top';   
$user = 'thsi_35748566';   
$pass = "GKSmx027";   
$database = 'thsi_35748566_personas';     
$conn = mysqli_connect($host,$user,$pass,$database);   
if (!$conn) {                                             
    die("Conexión fallida con base de datos: " . mysqli_connect_error());     
  }
?>