<?php
    include_once 'header.php';
    include_once 'database.php';
    //ne želim prikazati preteklih oglasov
    
    echo '<a href="categories_add.php">Dodaj kategorijo</a><br /><br />';
    
    $sql = "SELECT * 
            FROM categories c";
    
    $result = mysql_query($sql);
    
    while ($row = mysql_fetch_array($result)) {
        echo "<p>";
            echo $row['name'];
            echo ' <a href="categories_delete.php?id='.$row['id'].'" 
                    onclick="return confirm(\'Ali ste prepričani?\');">
                   Izbriši </a>';
        echo "</p>";               
    }
    
    include_once 'footer.php';
?>