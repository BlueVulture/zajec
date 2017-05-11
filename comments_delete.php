<?php
    include_once 'session.php';
    include_once 'database.php';

    $id = (int) $_GET['id'];
    $ad_id = (int) $_GET['ad_id'];
    $user_id = $_SESSION['user_id'];
    //preverim, če ima pravice brisanja    
    $query = "SELECT * FROM comments c INNER JOIN ads a
        ON a.id=c.ad_id 
        WHERE c.id = $id AND
        ((c.user_id = $user_id) OR 
        (a.user_id = $user_id))";
    $result = mysqli_query($conn, $query);    
    //če ima pravice
    if (mysqli_num_rows($result) > 0) {
        mysqli_query($conn, "DELETE FROM comments WHERE id= $id");
    }
    header("Location: ad_view.php?id=$ad_id");
?>