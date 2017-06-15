<?php
include_once 'session.php';
include_once 'database.php';

$ad_id = (int) $_POST['id'];

$current_datetime = date('Y-m-d H:i:s');

$date_query = "SELECT date_e FROM ads WHERE id = '$ad_id'";
$date_result = mysqli_query($conn, $date_query);

$date = mysqli_fetch_array($date_result);

$query = "SELECT bid, high_bid, price FROM ads WHERE id = '$ad_id'";
$result = mysqli_query($conn, $query);

$bid = mysqli_fetch_array($result);

//var_dump("$bid");
//var_dump("$new_bid");

// while ($bid)
// {
  //var_dump("$bid");
    if($current_datetime<$date['date_e'])
    {
      $sql = "UPDATE ads
              SET bid = ".$bid['price'].", high_bid =". $_SESSION['user_id']."
              WHERE id = '$ad_id';";

              mysqli_query($conn, $sql);

              $query="UPDATE ads SET enabled=0 WHERE (id=".$ad_id.")";
              mysqli_query($conn,$query);

              $_SESSION['notice'] = "Uspešno ste kupili izdelek!";
              header("Location: ad_view.php?id=$ad_id");

    }
    else {
        $_SESSION['notice'] = "Ne morete položiti ponudbe!";
        header("Location: ad_view.php?id=$ad_id");
    }



 ?>
