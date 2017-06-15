<?php

    include_once 'session.php';
    include_once 'database.php';

    $title = $_POST['title'];
    $date_e = $_POST['date_e'];
    $price = $_POST['price'];
    $category_id = (int)$_POST['category_id'];
    $description = $_POST['description'];
    $ad_id = (int) $_POST['id'];

    // var_dump($title);
    // var_dump($date_e);
    // var_dump($price);
    // var_dump($category_id);
    // var_dump($description);
    // var_dump($ad_id);

    $user_id = (int)$_SESSION['user_id'];
    //preverim, če so izpolnjeni obvezni atributi
    if (!empty($title) && !empty($date_e) && !empty($price)) {
        $sql = sprintf("UPDATE ads SET title = '%s',
                                       date_e= '%s',
                                       description = '%s',
                                       category_id = $category_id,
                                       price = '%s'
                        WHERE id = $ad_id AND user_id = $user_id",
                mysqli_real_escape_string($conn, $title),
                mysqli_real_escape_string($conn, $date_e),
                mysqli_real_escape_string($conn, $description),
                mysqli_real_escape_string($conn, $price));

        mysqli_query($conn, $sql);

        header("Location: ad_view.php?id=".$ad_id);
        die();
    }
?>
