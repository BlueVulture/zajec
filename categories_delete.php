<?php
    include_once 'session.php';
    include_once 'database.php';
    
    $id = (int) $_GET['id'];   
    //pred brisanjem kategorije moramo preveriti, 
    //da so prazne tudi oglasov
    $query = "SELECT * FROM ads WHERE category_id = $id";
    $result = mysql_query($query);    
    if (mysql_num_rows($result) == 0) {    
        $sql = "DELETE FROM categories 
                WHERE id = $id";
        mysql_query($sql);
    }
    header("Location: categories_list.php");
?>