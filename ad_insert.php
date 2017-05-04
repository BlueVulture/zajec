<?php
    include_once 'session.php';
    include_once 'database.php';
    
    $title = $_POST['title'];
    $date_b = $_POST['date_b'];
    $date_e = $_POST['date_e'];
    $price = $_POST['price'];
    $category_id = (int)$_POST['category_id'];
    $description = $_POST['description'];
    
    $user_id = (int)$_SESSION['user_id'];
    //preverim, če so izpolnjeni obvezni atributi
    if (!empty($title) && !empty($date_b) 
            && !empty($date_e) && !empty($price)
            ) {
        $query = sprintf("INSERT INTO ads(title, 
                           date_b, date_e, price, 
                           category_id, user_id, 
                           description)
                          VALUES ('%s','%s','%s',
                          '%s',$category_id,
                          $user_id,'%s')",
                mysql_real_escape_string($title),
                mysql_real_escape_string($date_b),
                mysql_real_escape_string($date_e),
                mysql_real_escape_string($price),
                mysql_real_escape_string($description)
                );
                mysql_query($query);
                $ad_id = mysql_insert_id();
                header("Location: ad_view.php?id=$ad_id");
    }
    else {
        header("Location: ad_add.php");
    }
?>