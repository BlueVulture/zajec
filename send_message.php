<?php
include_once 'session.php';
include_once 'database.php';

$admin_query = "SELECT admin FROM users WHERE id = ".$_SESSION['user_id'].";";
$admin_result = mysqli_query($conn, $admin_query);
$admin = mysqli_fetch_array($admin_result);

$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

mail($email, $subject, $message."/n/n/n To sporočilo je bilo poslano preko spletne trgovine Zajec.");


$_SESSION['notice']="Sporočilo je bilo uspešno poslano.";
header("Location: messages.php")


 ?>
