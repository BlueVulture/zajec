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
    $result = mysql_query($query);    
    //če ima pravice
    if (mysql_num_rows($result) > 0) {
        mysql_query("DELETE FROM comments WHERE id= $id");
    }
    header("Location: ad_view.php?id=$ad_id");
?>