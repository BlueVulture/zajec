<?php
include_once 'header.php';
include_once 'database.php';
//kateri oglas moram prikazati
$ad_id = (int) $_GET['id'];

$query = "SELECT a.title, a.date_b, a.date_e,
                    a.price, a.description, c.name,
                    a.user_id
                FROM ads a INNER JOIN categories c
                ON a.category_id=c.id
              WHERE a.id = $ad_id";
//pošljem podatke v bazo
$result = mysql_query($query);
//premenim rezultat v "berljivo" obliko
$ad = mysql_fetch_array($result);
?>

<div id="ad">
    <div id="ad_pictures">
        <?php
        //prebrat vse slike, vezane na ta oglas
        $query = "SELECT * FROM pictures
                WHERE ad_id = $ad_id";
        $result = mysql_query($query);
        //preverim, če ima oglas sploh, kakšno sliko
        if (mysql_num_rows($result) == 0) {
            //izrišem sliko "ni slike"
            echo '<img src="images/nopicture.jpg" alt="ni slike" width="120" />';
        } else {
            //oglas ima nekaj slik
            while ($picture = mysql_fetch_array($result)) {
                echo '<div class="delete_wrap">';
                if ($_SESSION['user_id'] == $ad['user_id']) {
                    echo '<a href="delete_picture.php?id='.$picture['id'].'&ad_id='.$ad_id.'" 
                          class="myaction"
                          onclick="return confirm(\'Ali ste prepričani?\');">Izbriši</a>';
                    //echo '<br />';
                }
                echo '<a class="fancybox" rel="group" href="' . $picture['url'] . '">
                      <img src="' . $picture['url'] . '" alt="slika" width="120" />
                      </a>';
                //echo '<br />';
                
                echo '</div>';
            }
        }
        ?>
        <?php
            if ($_SESSION['user_id'] == $ad['user_id']) {
        ?>
        <form action="ad_add_picture.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $ad_id; ?>" />
            <input type="file" name="file" />
            <input type="submit" value="Naloži" />
        </form>
        <?php
            }
        ?>
    </div>
    <div id="ad_data">
<?php
        echo '<h3>' . $ad['title'] . '</h3>';
        echo '<i>' . $ad['name'] . '</i><br />';
        echo $ad['date_b'] . ' - ' . $ad['date_e'];
        echo '<h3>' . $ad['price'] . '</h3>';
        echo '<p>' . $ad['description'] . '</p>';
?>
    </div>
    <div id="comments">
        <h4>Komentaraj:</h4>
        <form action="comments_insert.php" method="post">
            <input type="hidden" name="ad_id" 
                   value="<?php echo $ad_id; ?>" />
            <textarea name="comment" cols="23" rows="4"></textarea>
            <br />
            <input type="submit" name ="submit" value="Pošlji" />
        </form>
<?php
   //izpis vseh komentarjev za ta oglas
    $query = "SELECT c.*, u.first_name, u.last_name  
              FROM comments c INNER JOIN users u 
              ON c.user_id = u.id
              WHERE c.ad_id = $ad_id
              ORDER BY c.date_c DESC";
    $result = mysql_query($query);
    
    while ($row = mysql_fetch_array($result)) {
        echo '<div class="comment">';
        echo $row['first_name'].' '.$row['last_name'].' - '
                .date('d. m. Y H:i:s',strtotime($row['date_c'])).'<br />';
        echo htmlspecialchars($row['content']);
        if (($ad['user_id'] == $_SESSION['user_id']) || 
                ($row['user_id'] == $_SESSION['user_id'] )) {
            echo '<br />';
            echo '<a href="comments_delete.php?id='.$row['id'].'&ad_id='.$ad_id.'">
                Izbriši</a>';
        }
        echo '</div>';
    }
?>
    </div>
</div>

<?php
//preverim, če je oglas od trenutno prijavljenega
//uporabnika
if ($_SESSION['user_id'] == $ad['user_id']) {
    echo '<a href="ad_delete.php?id=' . $ad_id . '">Izbriši</a>';
    echo ' <a href="ad_edit.php?id=' . $ad_id . '">Uredi</a>';
}

include_once 'footer.php';
?>