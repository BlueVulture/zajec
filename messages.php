<?php
include_once 'header.php';
include_once 'database.php';

$admin_query = "SELECT admin FROM users WHERE id = ".$_SESSION['user_id'].";";
$admin_result = mysqli_query($conn, $admin_query);
$admin = mysqli_fetch_array($admin_result);

?>

<h1>Sporočila</h1>

<form action="send_message.php" method="post">
    Prejemnik: <input type="email" name="email" /><br />
    Zadeva: <input type="text" name="subject" /><br />
    Sporočilo:<br /> <textarea rows=10 cols=50 name="message" /></textarea>
    <br /><br />
    <input type="submit" name="submit" value="Pošlji" />
    <input type="reset" name="reset" value="Prekliči" />
</form>


<?php
   include_once 'nav_menu.php';
   include_once 'footer.php';
?>
