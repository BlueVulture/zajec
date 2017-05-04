<?php
    include_once 'header.php';
    include_once 'database.php';
    //id oglasa, ki ga bomo urejali
    $ad_id = (int) $_GET['id'];
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT * FROM ads 
            WHERE id=$ad_id AND user_id=$user_id";
    
    $result = mysql_query($sql);
    
    //če slučajno uporabnik ni lastni, ga preusmerim nazaj na 
    //seznam vseh oglasov
    if (mysql_num_rows($result) != 1) {
        header("Location: ad_list.php");
        die();
    }

    //vse podatke o oglasu si shranim v spremenljivko $ad
    $ad = mysql_fetch_array($result);
    
    
    
?>
<form action="ad_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $ad['id']; ?>" />
    <table border="0">
        <tr>
            <td>Naslov:</td>
            <td><input type="text" name="title" value="<?php echo $ad['title']; ?>" required="required"  /></td>
        </tr>
        <tr>
            <td>Datum začetka:</td>
            <td><input type="date" name="date_b" value="<?php echo $ad['date_b']; ?>"required="required" /></td>
        </tr>
        <tr>
            <td>Datum konca:</td>
            <td><input type="date" name="date_e" value="<?php echo $ad['date_e']; ?>" required="required" /></td>
        </tr>
        <tr>
            <td>Cena:</td>
            <td><input type="number" name="price" value="<?php echo $ad['price']; ?>" required="required" /></td>
        </tr>
        <tr>
            <td>Kategorija:</td>
            <td>
                <?php 
                $categories = mysql_query(
                        "SELECT * 
                         FROM categories");
                echo '<select name="category_id">';
                while ($category = mysql_fetch_array($categories)) {
                    if ($ad['category_id'] == $category["id"]) {
                       echo '<option value="'
                             .$category["id"].'" selected="selected">'
                             .$category["name"]
                             .'</option>'; 
                    }
                    else {
                        echo '<option value="'
                             .$category["id"].'">'
                             .$category["name"]
                             .'</option>';
                    }
                }
                echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <td>Opis:</td>
            <td><textarea name="description" cols="20" rows="8"><?php echo $ad['description']; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Vnesi" />
            </td>
        </tr>
    </table>
</form>
 <?php   
    include_once 'footer.php';
?>