<?php
    include_once 'session.php';
    include_once 'database.php';
    
    $name = $_POST['name'];      
    //preverim, če so izpolnjeni obvezni atributi
    if (!empty($name)) {
        $query = sprintf("INSERT INTO categories(name)
                          VALUES ('%s')",
                mysql_real_escape_string($name)
                );
                mysql_query($query);
                header("Location: categories_list.php");
    }
    else {
        header("Location: categories_add.php");
    }
?>