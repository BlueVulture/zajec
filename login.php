<?php
    include_once 'header.php';
?>

<form action="login_check.php" method="post" onsubmit="return formCheck(this)">
    E-pošta: <input type="text" name="email" /><br />
    Geslo: <input type="password" name="pass" onkeypress="skrij()" /><span id="error"></span><br />
    
    <input type="submit" name="submit" value="Prijavi" />
</form>

<?php
    include_once 'footer.php';
?>