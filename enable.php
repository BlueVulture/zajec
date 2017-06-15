<?php
<<<<<<< HEAD
    require_once 'database.php';
    if (isset($_GET["id"]))
        {
        $id=$_GET["id"];
<<<<<<< HEAD
        $result=mysqli_query($db,"SELECT * FROM ads WHERE (id='$id') ");
        
    
=======
    $id=$row['id']
    $result=mysql_query($conn,"SELECT enable FROM ads WHERE (id="$id") ")
>>>>>>> parent of c4aa87a... Doing stuff
        if($row=mysqli_fetch_array($result))
        {  
            $res=$row['enabled'];
            if($res==1)
            {

    mysqli_execute($db,"UPDATE ads SET enabled='1' WHERE (id='$id')");
=======
        $result=mysqli_query($conn,"SELECT * FROM ads WHERE (id='$id')");
        }

        if($row=mysqli_fetch_array($result))
        {
            $res=$row['enabled'];
            if($res=1)
            {
<<<<<<< HEAD
    $query="UPDATE ads SET enabled=0 WHERE (id='$id')";
    mysqli_query($conn,$query);
>>>>>>> origin/master
             }
    else
            {$sql="UPDATE ads SET enabled='0' WHERE (id='$id')";
        $conn->query($sql);
=======
    $query="UPDATE ads SET enable=0 WHERE (id="$id")";
    mysql_query($conn,$query);
             }
    else
            {
        $query="UPDATE ads SET enable=1 WHERE (id="$id")";
    mysql_query($conn,$query);
>>>>>>> parent of c4aa87a... Doing stuff
            }
        }
<<<<<<< HEAD
        header("Location: ad_list.php?sc");
        }
        else{
        header("Location: ad_list.php?error");}
?>
=======

        header("Location: ad_list.php");

?>
>>>>>>> origin/master
