<?php
    include_once 'session.php';
    include_once 'database.php';
    //sprejmem ID oglasa za katerega delam
    $ad_id = (int) $_POST['id'];
    $user_id = $_SESSION['user_id'];

    //preverim, če je oglas od prijavljenega uporabnika
    $result = mysqli_query($conn, "SELECT * FROM ads WHERE id=$ad_id
                            AND user_id = $user_id");
    if (mysqli_num_rows($result) == 0) {
        $_SESSION['notice'] = 'TO NI TVOJ OGLAS!!!';
        header("Location: ad_list.php");
        die();
    }

    //slike oz. datiteke nimam v POST, ampak
    //jo imam v $_FILES
    //$allowed = array("jpg", "png", "gif", "jpeg");

    //spremenljivki $_FILES['file']['name'] se nahaja
    //ime naložene datoteke
    //$ext = end(explode(".",$_FILES['file']['name']));

      //sliko naložimo v naš sistem
      $name = str_replace("watch?v=","embed/", $_POST['video']);

      echo $name;
      //zapisat sliko v bazo!
      mysqli_query($conn, "INSERT INTO videos (ad_id, url)
                     VALUES ($ad_id, '$name')");

        $_SESSION['notice'] = "Uspešno ste dodali video!";

    //redirect nazaj na oglas
    header("Location: ad_view.php?id=".$ad_id);
?>
