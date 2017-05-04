<?php
include_once 'header.php';
include_once 'database.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id=$user_id";
$result = mysql_query($query);
//imamo vse podatke o uporabniku
$user = mysql_fetch_array($result);

if (isset($_POST['submit'])) {
    if (!empty($_POST['pass0'])) {
        $pass0 = sha1($_POST['pass0']);
        if ($pass0 == $user['pass']) {
            //če je geslo enako staremu - spremenim v novo
            if ($_POST['pass1'] == $_POST['pass2']) {
                $pass = sha1($_POST['pass1']);
                mysql_query("UPDATE users SET pass = '$pass'
                            WHERE id = $user_id");
            }
        }
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $query = sprintf("UPDATE users SET first_name='%s',
                            last_name = '%s',
                            phone = '%s',
                            email = '%s'
                           WHERE id = $user_id", 
            mysql_real_escape_string($first_name), 
            mysql_real_escape_string($last_name), 
            mysql_real_escape_string($phone), 
            mysql_real_escape_string($email));
    mysql_query($query);
}

$query = "SELECT * FROM users WHERE id=$user_id";
$result = mysql_query($query);
//imamo vse podatke o uporabniku
$user = mysql_fetch_array($result);
?>

<h1>Moj profil</h1>

<form action="profile.php" method="post">
    Ime: <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" /><br />     
    Priimek: <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" /><br />
    E-pošto: <input type="email" name="email" value="<?php echo $user['email']; ?>" /><br />
    Telefon: <input type="text" name="phone" value="<?php echo $user['phone']; ?>" /><br />
    Geslo (staro): <input type="password" name="pass0" /><br />
    Geslo (novo): <input type="password" name="pass1" /><br />
    Geslo(novo 2x): <input type="password" name="pass2" /><br />
    <input type="submit" name="submit" value="Shrani" />
    <input type="reset" name="reset" value="Prekliči" />
</form>

<?php
include_once 'footer.php';
?>
