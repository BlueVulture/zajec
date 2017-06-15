<?php
include_once 'session.php';
include_once 'database.php';

$admin_query = "SELECT admin FROM users WHERE id = ".$_SESSION['user_id'].";";
$admin_result = mysqli_query($conn, $admin_query);
$admin = mysqli_fetch_array($admin_result);




 ?>
