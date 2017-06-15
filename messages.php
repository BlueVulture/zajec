<?php
include_once 'header.php';
include_once 'database.php';

$admin_query = "SELECT admin FROM users WHERE id = ".$_SESSION['user_id'].";";
$admin_result = mysqli_query($conn, $admin_query);
$admin = mysqli_fetch_array($admin_result);

?>

<h1>Sporočila</h1>

<form action="send_message.php" method="post">
    <b>Prejemnik: </b><input type="email" name="email" id="email" /><br />
    <b>Zadeva: </b><input type="text" name="subject" /><br />
    <b>Sporočilo: </b><br /> <textarea rows=10 cols=50 name="message" /></textarea>
    <br /><br />

    <?php
      if($admin['admin'] == 1)
      {
        echo 'Pošlji oglas: <select name="oglas">';

        $query = "SELECT title FROM ads;";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($result))
        {
          echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
        }

        echo '</select></br>';
        echo 'Pošlji vsem: <input type="checkbox" id="send_all_check" name="send_all" onclick="send_all_msg();">';

      }
     ?>

    <input type="submit" name="submit" value="Pošlji" />
    <input type="reset" name="reset" value="Prekliči" />
</form>


<?php
   include_once 'nav_menu.php';
   include_once 'footer.php';
?>
