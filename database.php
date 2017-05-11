<?php

$db_user ='b31_20068105';
$db_pass = 'BeliZajec123';
$db_name = 'b31_20068105_zajec';
$db_server = 'sql308.byetcluster.com';

//povezava na mysql strežnik;
$conn = mysqli_connect($db_server, $db_user, $db_pass);

//izbira podatkovne baze na strežniku
$db = mysqli_select_db($db_name);

//reševanje težave s šumniki
$query = mysqli_query("SET NAMES 'utf8'");

?>
