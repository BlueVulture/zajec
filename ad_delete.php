<?php
    include_once 'session.php';
    include_once 'database.php';
    
    $id = (int) $_GET['id'];
    $user_id = $_SESSION['user_id'];
    
    //pred brisanjem oglasa moramo izbrisati še vse 
    //njegove komentarje in slike
    
    $sql = "DELETE FROM ads 
            WHERE id = $id AND user_id = $user_id";
    
    mysql_query($sql);
    
    header("Location: ad_list.php");
?>