<?php
    include_once 'session.php';
    include_once 'database.php';

    $title = $_POST['title'];
    $date_b = date("Y-m-d h:m:s");
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
                mysqli_real_escape_string($conn, $title),
                mysqli_real_escape_string($conn, $date_b),
                mysqli_real_escape_string($conn, $date_e),
                mysqli_real_escape_string($conn, $price),
                mysqli_real_escape_string($conn, $description)
                );
                mysqli_query($conn, $query);
                $ad_id = mysqli_insert_id($conn);
                //var_dump($ad_id);
                header("Location: ad_view.php?id=$ad_id");
    }
    else {
        header("Location: ad_add.php");
    }
?>
