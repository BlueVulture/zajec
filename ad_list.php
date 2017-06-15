<?php
    include_once 'header.php';
    include_once 'database.php';
    //ne želim prikazati preteklih oglasov
   $yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
    $curent_date = date('Y-m-d',$yesterday);
if($_SESSION['admin']==1)
{
    $admin="true";
    $sql = "SELECT *
            FROM ads a INNER JOIN categories c ON c.id=a.category_id";


    $result = mysqli_query($conn, $sql);
    $list_name = mysqli_fetch_array($result);
    }
    else{
    $sql = "SELECT a.id, a.title, a.price, c.name, a.enabled
            FROM ads a INNER JOIN categories c ON c.id=a.category_id
            WHERE (enabled='1') AND(a.date_e > '$curent_date')";

    $result = mysqli_query($conn, $sql);
    $list_name = mysqli_fetch_array($result);}

    while ($row = mysqli_fetch_array($result)) {


        if($row['enabled'] == 1){
          echo '<div class="oglas">';
        }
        else if($row['enabled'] != 1 && $admin['admin'] == 1){
          echo '<div class="oglas_disabled">';
        }


        if($row['enabled'] != 1 && $admin['admin'] == 1 || $row['enabled'] == 1)
        {

        //prikažem sliko
        echo '<a href=ad_view.php?id='.$row['id'].'">';
        //preveri ali oglas ima sliko
        $slike = "SELECT * FROM pictures WHERE ad_id = ".$row['id'];
        $r = mysqli_query($conn, $slike);


        /*<form action="enable.php" method="post" enctype="multipart/form-data" id="enable">
            <input type="hidden" name="id" value="<?php echo $ad_id; ?>" />
            <input type="url" name="video" />
            <input type="submit" value="wut" />
        </form>*/
        //include_once (enable.php);
        if (mysqli_num_rows($r) > 0)
        {
            //ima slike
            $slika = mysqli_fetch_array($r);
            echo '<img src="'.$slika['url'].'" width="100px" />';

        }
        else
        {
            //nima slike
            echo '<img src="images/nopicture.jpg" width="100px" />';
        }
        echo '</a>';
        echo "<h3>".$row['title']."</h3>";
        echo "<b>".$row['price']." € </b>";
        echo '<br />';
        echo "<i>".$row['name']."</i>";

       if($admin=='true')
           {
           $lol=mysqli_fetch_row($result);
       echo '</br><a href="enable.php?id='.$lol[0].'"" class="button">Enable/Disable</a>';

           }

        echo "";
        echo '</div>';
      }
    }

    include_once 'nav_menu.php';
    include_once 'footer.php';
?>
