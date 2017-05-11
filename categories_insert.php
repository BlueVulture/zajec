<?php
    include_once 'session.php';
    include_once 'database.php';
    
    $name = $_POST['name'];      
    //preverim, če so izpolnjeni obvezni atributi
    if (!empty($name)) {
        $query = sprintf("INSERT INTO categories(name)
                          VALUES ('%s')",
                mysqli_real_escape_string($name)
                );
                mysqli_query($conn, $query);
                header("Location: categories_list.php");
    }
    else {
        header("Location: categories_add.php");
    }
?>