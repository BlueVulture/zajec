<?php
    include_once 'header.php';
    include_once 'database.php';
    //želim prikazati moje oglase
    $sql = "SELECT a.id, a.title, a.price, c.name, a.enabled
            FROM ads a INNER JOIN categories c ON c.id=a.category_id
            WHERE a.user_id = ".$_SESSION['user_id'];

    $result = mysqli_query($conn, $sql);

    echo '<h3 class="sub-title">Moji oglasi</h3>';

    while ($row = mysqli_fetch_array($result)) {
      if($row['enabled'] == 1){
        echo '<div class="oglas">';
      }
      else if($row['enabled'] != 1){
        echo '<div class="oglas_disabled">';
      }
      else{
      }
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
        echo '</div>';
    }

    include_once 'nav_menu.php';
    include_once 'footer.php';
?>
