<?php
    include_once 'header.php';
    include_once 'database.php';
    //ne želim prikazati preteklih oglasov
   $yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
    $curent_date = date('Y-m-d',$yesterday);

    $sql = "SELECT a.id, a.title, a.price, c.name
            FROM ads a INNER JOIN categories c ON c.id=a.category_id
            WHERE a.date_e > '$curent_date'";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        echo '<div class="oglas">';
        //prikažem sliko
        echo '<a href="ad_view.php?id='.$row['id'].'">';
        //preveri ali oglas ima sliko
        $slike = "SELECT * FROM pictures WHERE ad_id = ".$row['id'];
        $r = mysqli_query($conn, $slike);
        if (mysqli_num_rows($r) > 0) {
            //ima slike
            $slika = mysqli_fetch_array($r);
            echo '<img src="'.$slika['url'].'" width="100px" />';
        }
        else {
            //nima slike
            echo '<img src="images/nopicture.jpg" width="100px" />';
        }
        echo '</a>';
        echo "<h3>".$row['title']."</h3>";
        echo "<b>".$row['price']." € </b>";
        echo '<br />';
        echo "<i>".$row['name']."</i>";
        echo '<br /><br />';

        $query = "SELECT u.first_name, u.last_name
                  FROM users u INNER JOIN ads a ON a.user_id=u.id
                  WHERE a.id='$id'";

        $result = mysqli_query($conn, $query);

        echo "";
        echo '</div>';
    }

    include_once 'nav_menu.php';
    include_once 'footer.php';
?>
