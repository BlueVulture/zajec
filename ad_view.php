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
$result = mysqli_query($conn, $query);
//premenim rezultat v "berljivo" obliko
$ad = mysqli_fetch_array($result);
?>

<div id="ad">
    <div id="ad_pictures">
        <?php
        //prebrat vse slike, vezane na ta oglas
        $query = "SELECT * FROM pictures
                WHERE ad_id = '$ad_id'";
        $result = mysqli_query($conn, $query);
        //preverim, če ima oglas sploh, kakšno sliko
        if (mysqli_num_rows($result) == 0) {
            //izrišem sliko "ni slike"
            echo '<img src="images/nopicture.jpg" alt="ni slike" width="120" />';
        } else {
            //oglas ima nekaj slik
            while ($picture = mysqli_fetch_array($result)) {
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
        <form action="ad_add_picture.php" method="post" enctype="multipart/form-data" id="nalozi-slike">

            <input type="hidden" name="id" value="<?php echo $ad_id; ?>" />
            <input type="file" name="file" />
            <input type="submit" value="Naloži" />
        </form>

        <?php
            }
        ?>

        <?php
        $query = "SELECT * FROM videos
                WHERE ad_id = '$ad_id'";
        $result = mysqli_query($conn, $query);
        //preverim, če ima oglas sploh, kakšno sliko
        if (mysqli_num_rows($result) == 0) {
        } else {
            //oglas ima nekaj slik
            while ($video = mysqli_fetch_array($result)) {
                echo '<div class="delete_wrap">';
                if ($_SESSION['user_id'] == $ad['user_id']) {
                    echo '<a href="delete_video.php?id='.$video['id'].'&ad_id='.$ad_id.'"
                          class="myaction"
                          onclick="return confirm(\'Ali ste prepričani?\');">Izbriši</a>';
                    //echo '<br />';
                }
                echo '<iframe width="320" height="240" src="' . $video['url'] . '"></iframe>';
                //echo '<br />';

                echo '</div>';
            }
        }
        ?>
        <?php
            if ($_SESSION['user_id'] == $ad['user_id']) {
        ?>
        <span id="nalozi_video">Naloži video:</span>
        <form action="ad_add_video.php" method="post" enctype="multipart/form-data" id="nalozi-slike">
            <input type="hidden" name="id" value="<?php echo $ad_id; ?>" />
            <input type="url" name="video" />
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


        echo '<h4 id="cena">Cena: ' . $ad['price'] . ' €</h4>';

        echo '<div id="ponudba">Oddajte ponudbo: <form action="" method="post"><input type="text"><input type="submit"></form></div>';

        echo '<p>' . $ad['description'] . '</p>';
?>
    </div>
    <div id="comments">
        <h4>Komentiraj:</h4>
        <form action="comments_insert.php" method="post">
            <input type="hidden" name="ad_id"
                   value="<?php echo $ad_id; ?>" />
            <textarea name="comment" cols="50" rows="4"></textarea>
            <br />
            <input type="submit" name ="submit" value="Pošlji" />
        </form>
        <hr>
<?php
   //izpis vseh komentarjev za ta oglas
    $query = "SELECT c.*, u.first_name, u.last_name
              FROM comments c INNER JOIN users u
              ON c.user_id = u.id
              WHERE c.ad_id = $ad_id
              ORDER BY c.date_c DESC";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="comment">';
        echo '<span class="com_aut">'.$row['first_name'].' '.$row['last_name'].' - '.date('d. m. Y H:i:s',strtotime($row['date_c'])).'</span>';

        echo htmlspecialchars($row['content']);

        if (($ad['user_id'] == $_SESSION['user_id']) || ($row['user_id'] == $_SESSION['user_id'] )) {
            echo '<br />';
            echo '<a href="comments_delete.php?id='.$row['id'].'&ad_id='.$ad_id.'">Izbriši</a>';
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
    echo '<span id="del_ad"><a href="ad_delete.php?id=' . $ad_id . '"><button type="button">Izbriši</button></a>';
    echo ' <a href="ad_edit.php?id=' . $ad_id . '"><button type="button">Uredi</button></a></span>';
}

include_once 'nav_menu.php';
    include_once 'footer.php';
?>
