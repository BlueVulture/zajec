<?php
    include_once 'session.php';
    include_once 'database.php';
    //sprejmem ID oglasa za katerega delam
    $ad_id = (int) $_POST['id'];
    $user_id = $_SESSION['user_id'];
    
    //preverim, če je oglas od prijavljenega uporabnika
    $result = mysql_query("SELECT * FROM ads WHERE id=$ad_id
                            AND user_id = $user_id");
    if (mysql_num_rows($result) == 0) {
        $_SESSION['notice'] = 'TO NI TVOJ OGLAS!!!';
        header("Location: ad_list.php");
        die();
    }
    //slike oz. datiteke nimam v POST, ampak
    //jo imam v $_FILES
    $allowed = array("jpg", "png", "gif", "jpeg");
    //spremenljivki $_FILES['file']['name'] se nahaja
    //ime naložene datoteke
    $ext = end(explode(".",$_FILES['file']['name']));
        
    if (in_array($ext, $allowed) && 
            ($_FILES["file"]["size"] < 1000000)) {
    
        //sliko naložimo v naš sistem
        $new_name = "pictures/".date("YmdHis")."-".$ad_id."-".$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],
                $new_name);
        //zapisat sliko v bazo!
        mysql_query("INSERT INTO pictures (ad_id, url)
                     VALUES ($ad_id, '$new_name')");
        
        $_SESSION['notice'] = "Uspešno ste dodali sliko!";
    }
    //redirect nazaj na oglas
    header("Location: ad_view.php?id=".$ad_id);
?>
