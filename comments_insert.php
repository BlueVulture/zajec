<?php
    include_once 'session.php';
    include_once 'database.php';
    
    $ad_id = (int) $_POST['ad_id'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
    
    $query = sprintf("INSERT INTO 
                      comments(ad_id, user_id, content, date_c)
                      VALUES ($ad_id, $user_id, '%s', NOW())",
               mysqli_real_escape_string($conn, $comment));
    /*$query = "INSERT INTO 
                      comments(ad_id, user_id, content, date_c)
                      VALUES ($ad_id, $user_id, '$comment',NOW())";*/
    //echo $query; die();
    
    mysqli_query($conn, $query);
    
    //preusmerimo nazaj na oglas
    
//    var_dump($query)
    header("Location: ad_view.php?id=$ad_id");
?>