<?php
    include_once 'session.php';
    include_once 'database.php';

    $id = (int) $_GET['id'];
    $user_id = $_SESSION['user_id'];

    //pred brisanjem oglasa moramo izbrisati še vse
    //njegove komentarje in slike

    $sql = "DELETE FROM videos
            WHERE ad_id = $id;";

            mysqli_query($conn, $sql);

    $sql = "DELETE FROM pictures
            WHERE ad_id = $id;";

            mysqli_query($conn, $sql);

    $sql = "DELETE FROM comments
            WHERE ad_id = $id AND user_id = $user_id;";

            mysqli_query($conn, $sql);

    $sql = "DELETE FROM ads
            WHERE id = $id AND user_id = $user_id;";

            mysqli_query($conn, $sql);

    header("Location: ad_list.php");
?>
