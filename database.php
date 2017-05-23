<?php

$db_user ='b31_20068105';
$db_pass = 'BeliZajec123';
$db_name = 'zajec';
$db_server = 'localhost';

//povezava na mysql strežnik;
$conn = mysqli_connect($db_server, $db_user, $db_pass);

//izbira podatkovne baze na strežniku
$db = mysqli_select_db($conn, $db_name);

//reševanje težave s šumniki
$query = mysqli_query($conn, "SET NAMES 'utf8'");
//test za git hub
?>
