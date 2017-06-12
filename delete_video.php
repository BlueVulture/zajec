<?php
include_once 'session.php';
include_once 'database.php';

$video_id = (int) $_GET['id'];
$ad_id = (int) $_GET['ad_id'];

//preverim, če je prijavljeni lastnik te slike
$query = "SELECT * FROM videos p
          INNER JOIN ads a ON a.id=p.ad_id
          WHERE p.id = $video_id AND
          a.user_id = ".$_SESSION['user_id'];
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    //to je njegova slika
    mysqli_query($conn, "DELETE FROM videos WHERE id = $video_id");
    header("Location: ad_view.php?id=$ad_id");
}

?>
