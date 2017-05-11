<?php
include_once 'session.php';
//povezava do baze
include_once 'database.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

if (!empty($email) && !empty($pass)) {
    //podatki obstajajo
    //geslo zakodiramo
    $pass = sha1($pass);
    $query = sprintf("SELECT * FROM users 
                        WHERE email='%s' AND pass = '%s'",
            mysqli_real_escape_string($conn, $email),
            mysqli_real_escape_string($conn, $pass));
    
    $result = mysqli_query($conn, $query);
    //število vrstic mora biti enako 1
    if (mysqli_num_rows($result) > 0) {
        //vse je ok - podatki so ustrezni
        //shranimo si podatke o uporabniku
        $user = mysqli_fetch_array($result);
        //v sejo si shranimo podatke o uporabniku
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['first_name'].' '.$user['last_name'];
        header("location: index.php");
        die(); //prekine delovanje te strani        
    }
    else {
        header("location: login.php");
        die(); //prekine delovanje te strani
    }    
}
else {
    header("location: login.php");
    die(); //prekine delovanje te strani
}
?>