<?php
    $id=$row['id']
    $result=mysql_query($conn,"SELECT enable FROM ads WHERE (id="$id") ")
        if($row=mysqli_fetch_array($result))
        {  
            $res=row['enable'];
            if($res=1)
            {
    $query="UPDATE ads SET enable=0 WHERE (id="$id")";
    mysql_query($conn,$query);
             }
    else
            {
        $query="UPDATE ads SET enable=1 WHERE (id="$id")";
    mysql_query($conn,$query);
            }
        }
        
?>