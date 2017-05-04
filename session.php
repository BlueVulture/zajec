<?php
    //vzpostavimo sejo
    session_start();

    //bolkada za neprijavljene uporabnike
    if (!isset($_SESSION['user_id']) && 
            $_SERVER['REQUEST_URI'] != '/zajec/registration.php' &&
            $_SERVER['REQUEST_URI'] != '/zajec/login.php' &&
            $_SERVER['REQUEST_URI'] != '/zajec/login_check.php') {
        //neprijavljene uporabnike preusmerimo na prijavo
        //RAZEN, če niso na strani registracije ali prijave
        header("location: login.php");
        die();
    }
?>