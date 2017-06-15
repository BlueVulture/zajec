<?php
    require_once 'database.php';
    if (isset($_GET["id"]))
        {
        $id=$_GET["id"];

        $result=mysqli_query($db,"SELECT * FROM ads WHERE (id='$id') ");
        
    
        if($row=mysqli_fetch_array($result))
        {  
            $res=$row['enabled'];
            if($res==1)
            {

    mysqli_execute($db,"UPDATE ads SET enabled='1' WHERE (id='$id')");

        $result=mysqli_query($conn,"SELECT * FROM ads WHERE (id='$id')");
        }

        
    else
            {$sql="UPDATE ads SET enabled='0' WHERE (id='$id')";
        $conn->query($sql);
            }
        }

        header("Location: ad_list.php?sc");
        }
        else{
        header("Location: ad_list.php?error");}
?>
