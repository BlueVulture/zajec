<?php
    include_once 'session.php';
    include_once 'database.php';

    $query = "SELECT bid, price FROM ads WHERE id = '$ad_id'";
    $result = mysqli_query($conn, $query);

    $curr_bid =
