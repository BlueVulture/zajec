<?php
include_once 'session.php';
include_once 'database.php';

$admin_query = "SELECT admin FROM users WHERE id = ".$_SESSION['user_id'].";";
$admin_result = mysqli_query($conn, $admin_query);
$admin = mysqli_fetch_array($admin_result);

$query = "SELECT admin FROM users WHERE id = ".$_SESSION['user_id'].";";
$result = mysqli_query($conn, $admin_query);

$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$send_all =$_POST['send_all'];
$oglas = $_POST['oglas'];


if($admin['admin']==1 && $send_all){
  while($email = mysqli_fetch_array($result)){
    mail($email, $subject, $message."/n/n/n To sporočilo je bilo poslano preko spletne trgovine Zajec.");
  }
}
else if($admin['admin']==1 && $send_all && $oglas != '(nič)'){
  while($email = mysqli_fetch_array($result)){
    mail($email, $subject, $message."/n/n Poglejte si ta oglas: "."/n/n/n To sporočilo je bilo poslano preko spletne trgovine Zajec.");
  }
}
else if($admin['admin']==1 && $send_all){

}
else{
  mail($email, $subject, $message."/n/n/n To sporočilo je bilo poslano preko spletne trgovine Zajec.");
}

$_SESSION['notice']="Sporočilo je bilo uspešno poslano.";
header("Location: messages.php")


 ?>
