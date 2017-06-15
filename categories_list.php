<?php
    include_once 'header.php';
    include_once 'database.php';
    //ne želim prikazati preteklih oglasov

    $admin_query = "SELECT admin FROM users WHERE id = ".$_SESSION['user_id'].";";
    $admin_result = mysqli_query($conn, $admin_query);
    $admin = mysqli_fetch_array($admin_result);

    if($admin['admin'] == 1){
      echo '<a href="categories_add.php">Dodaj kategorijo</a><br /><br />';
    }

    $sql = "SELECT *
            FROM categories c";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo "<p>";
            echo $row['name'];

            if($admin['admin'] == 1){
              echo ' <a href="categories_delete.php?id='.$row['id'].'"
                      onclick="return confirm(\'Ali ste prepričani?\');">
                     Izbriši </a>';
            }

        echo "</p>";
    }

    include_once 'nav_menu.php';
    include_once 'footer.php';
?>
