<?php
    require 'database.php';
        $id=$_POST['id'];

        var_dump($id);
        $result=mysqli_query($conn,"SELECT * FROM ads WHERE (id='$id') ");


        if($row=mysqli_fetch_array($result))
        {
            if($row['enabled']==1)
            {
              $query="UPDATE ads SET enabled=0 WHERE (id=".$id.")";
              mysqli_query($conn,$query);
            }
            else
            {
                $query="UPDATE ads SET enabled=1 WHERE (id=".$id.")";
                mysqli_query($conn,$query);
            }
        }



        //header("Location: ad_list.php");

        // else{
        // header("Location: ad_list.php");}
?>
