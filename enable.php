<?php
    require_once 'database.php';
    if (isset($_GET["id"]))
        {
        $id=$_GET["id"];
        $result=mysqli_query($conn,"SELECT * FROM ads WHERE (id='$id')");
        }

        if($row=mysqli_fetch_array($result))
        {
            $res=$row['enabled'];
            if($res=1)
            {
    $query="UPDATE ads SET enabled=0 WHERE (id='$id')";
    mysqli_query($conn,$query);
             }
    else
            {
        $query="UPDATE ads SET enable=1 WHERE (id=".$id.")";
    mysqli_query($conn,$query);
            }
        }

        header("Location: ad_list.php");

?>
