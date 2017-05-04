<?php

$db_user = 'root';
$db_pass = 'abc123';
$db_name = 'zajec';
$db_server = 'localhost';

//povezava na mysql strežniksdsd
mysqli_connect($db_server, $db_user, $db_pass);

//izbira podatkovne baze na strežniku
mysql_select_db($db_name);

//reševanje težave s šumnikiwerwer
mysql_query("SET NAMES 'utf8'");

?>
