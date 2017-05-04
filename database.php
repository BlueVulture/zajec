<?php

$db_user = 'root';
$db_pass = 'abc123';
$db_name = 'zajec';
$db_server = 'localhost';

<<<<<<< HEAD
//povezava na mysql strežnik
=======
<<<<<<< HEAD
//povezava na mysql strežnik;
mysql_connect($db_server, $db_user, $db_pass);
=======
//povezava na mysql strežniksdsd
>>>>>>> origin/master
mysqli_connect($db_server, $db_user, $db_pass);
>>>>>>> a3dbbbf9ecf03408b48c1301fc2961bc7a7e958f

//izbira podatkovne baze na strežniku
mysql_select_db($db_name);

//reševanje težave s šumniki
mysql_query("SET NAMES 'utf8'");

?>
