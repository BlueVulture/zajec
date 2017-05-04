<?php
    include_once 'database.php';
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
       
    
    if (!empty($last_name) && !empty($email) && 
            !empty($pass1)) {
        if ($pass1 == $pass2) {
            $pass1 = sha1($pass1);
            $query = "INSERT INTO users(first_name,last_name,phone,email,pass)
                        VALUES ('$first_name','$last_name','$phone','$email','$pass1')";
            //echo $query; die();
            if(!mysql_query($query)) {
                //če ni uspešno, naj redirecta na registracijo
                header("Location: registration.php");
            }
            else {
                header("Location: index.php");
            }
        }
        else {
            header("Location: registration.php");
        }
    }
    else {
        //preusmeritev 
        header("Location: registration.php");
    }
?>