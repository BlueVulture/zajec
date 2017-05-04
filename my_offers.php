<?php
    include_once 'header.php';
    include_once 'database.php';
    //želim prikazati moje oglase    
    $sql = "SELECT a.id, a.title, a.price, c.name 
            FROM ads a INNER JOIN categories c ON c.id=a.category_id
            WHERE a.user_id = ".$_SESSION['user_id'];
    
    $result = mysql_query($sql);
    
    while ($row = mysql_fetch_array($result)) {
        echo '<div class="oglas">';
        //prikažem sliko
        echo '<a href="ad_view.php?id='.$row['id'].'">';
        //preveri ali oglas ima sliko
        $slike = "SELECT * FROM pictures WHERE ad_id = ".$row['id'];
        $r = mysql_query($slike);
        if (mysql_num_rows($r) > 0) {
            //ima slike
            $slika = mysql_fetch_array($r);
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
    
    include_once 'footer.php';
?>