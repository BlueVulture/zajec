<?php
    include_once 'header.php';
?>

<h1>Registracija</h1>

<form action="user_insert.php" method="post">
    Ime: <input type="text" name="first_name" /><br />     
    Priimek: <input type="text" name="last_name" /><br />
    E-pošto: <input type="email" name="email" /><br />
    Telefon: <input type="text" name="phone" /><br />
    Geslo: <input type="password" name="pass1" /><br />
    Geslo(2x): <input type="password" name="pass2" /><br />
    <input type="submit" name="submit" value="Shrani" />
    <input type="reset" name="reset" value="Prekliči" />
</form>

<?php
    include_once 'footer.php';
?>
