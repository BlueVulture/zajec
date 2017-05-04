<?php
    include_once 'header.php';
?>
<form action="categories_insert.php" method="post">
    <table border="0">
        <tr>
            <td>Ime:</td>
            <td><input type="text" name="name" required="required" /></td>
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