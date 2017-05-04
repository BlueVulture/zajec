<?php

$db_user = 'root';
$db_pass = 'abc123';
$db_name = 'zajec';
$db_server = 'localhost';

//povezava na mysql strežnik
mysql_connect($db_server, $db_user, $db_pass);

//izbira podatkovne baze na strežniku
mysql_select_db($db_name);

//reševanje težave s šumniki
mysql_query("SET NAMES 'utf8'");

?>
