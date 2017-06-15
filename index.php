<?php
    include_once 'header.php';
    include_once 'database.php';

?>
<?php if($_SESSION['admin']==1)
    {
        echo "<h1>Pozdravljeni ADMINISTRATOR</h1>";
    }
    else{
       echo "<h1>Pozdravljeni </h1>";
    }?>
<p>
<?php
    $sql = "SELECT * FROM users WHERE id=".$_SESSION['user_id'];
    //pošljem poizvedbo v PB in v spremenljivko query
    //se mi shrani rezultat
    $query = mysqli_query($conn, $sql);
    //rezultat spremenim v "berljivo" obliko tabele oz. array-a
    $result = mysqli_fetch_array($query);
    
    echo "Ime: ".$result['first_name'].'<br />';
    echo "Priimek: ".$result['last_name'].'<br />';
    echo "E-Pošta: ".$result['email'].'<br />';
    echo "Telefon: ".$result['phone'].'<br />';
    
?>
</p>

<?php
    include_once 'nav_menu.php';
    include_once 'footer.php';
?>