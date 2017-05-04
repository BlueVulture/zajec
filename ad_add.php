<?php
    include_once 'header.php';
?>
<form action="ad_insert.php" method="post">
    <table border="0">
        <tr>
            <td>Naslov:</td>
            <td><input type="text" name="title" required="required" /></td>
        </tr>
        <tr>
            <td>Datum začetka:</td>
            <td><input type="date" name="date_b" required="required" /></td>
        </tr>
        <tr>
            <td>Datum konca:</td>
            <td><input type="date" name="date_e" required="required" /></td>
        </tr>
        <tr>
            <td>Cena:</td>
            <td><input type="number" name="price" required="required" /></td>
        </tr>
        <tr>
            <td>Kategorija:</td>
            <td>
                <?php 
                include_once 'database.php';
                
                $categories = mysql_query(
                        "SELECT * 
                         FROM categories");
                echo '<select name="category_id">';
                while ($category = mysql_fetch_array($categories)) {
                    echo '<option value="'
                         .$category["id"].'">'
                         .$category["name"]
                         .'</option>';
                }
                echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <td>Opis:</td>
            <td><textarea name="description" cols="20" rows="8"></textarea></td>
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