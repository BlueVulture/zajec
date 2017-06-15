<?php
include_once 'session.php';
include_once 'database.php';

$query = "SELECT id, title, bid, high_bid, price, date_e, date_b, enabled FROM ads";
$result = mysqli_query($conn, $query);

$task = mysqli_fetch_array($result);

while($row = mysqli_fetch_array($result))
{
  if($row['date_e']<date('Y-m-d H:i:s') && $row['enabled'] == 1)
  {
    $buyer="SELECT u.first_name, u.last_name, u.email FROM users u INNER JOIN ads a ON a.user_id=u.id WHERE a.id=".$row['id'].";";
    $buyer_query = mysqli_query($conn, $buyer);
    $buyer_result = mysqli_fetch_array($buyer_query);

    //echo var_dump($buyer_result);
    $mail = $buyer_result['email'];

    mail("$mail", "Konec dražbe", "Uspešno ste zaključili dražbo z nazivom ".$row['title'].".");

    $seller="SELECT u.first_name, u.last_name, u.email FROM users u INNER JOIN ads a ON a.user_id=u.id WHERE a.id=".$row['id'].";";
    $seller_query = mysqli_query($conn, $seller);
    $seller_result = mysqli_fetch_array($seller_query);

    $mail = $seller_result['email'];

    mail("$mail", "Konec dražbe", "Uspešno ste zaključili dražbo z nazivom ".$row['title'].".
    Kupec je ".$buyer_result[first_name]." ".$buyer_result[last_name]."(".$buyer_result[email].").");

    $disable = "UPDATE ads SET enabled='0' WHERE id=".$row['id'].";";
    mysqli_query($conn, $disable);

    echo 'OK?';
  }
}
