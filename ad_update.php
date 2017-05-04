<?php

    include_once 'session.php';
    include_once 'database.php';
    
    $title = $_POST['title'];
    $date_b = $_POST['date_b'];
    $date_e = $_POST['date_e'];
    $price = $_POST['price'];
    $category_id = (int)$_POST['category_id'];
    $description = $_POST['description'];
    $ad_id = (int) $_POST['id'];
    
    $user_id = (int)$_SESSION['user_id'];
    //preverim, če so izpolnjeni obvezni atributi
    if (!empty($title) && !empty($date_b) 
            && !empty($date_e) && !empty($price)
            ) {
        $sql = sprintf("UPDATE ads SET title = '%s',
                                       date_b = '%s',
                                       date_e= '%s',
                                       description = '%s',
                                       category_id = $category_id,
                                       price = '%s'    
                        WHERE id = $ad_id AND user_id = $user_id",
                mysql_real_escape_string($title),
                mysql_real_escape_string($date_b),
                mysql_real_escape_string($date_e),
                mysql_real_escape_string($description),
                mysql_real_escape_string($price));
        
        mysql_query($sql);
        
        header("Location: ad_view.php?id=".$ad_id);
        die();
    }
?>
