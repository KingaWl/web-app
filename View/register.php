<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
?>

<?php include_once "header.php"; ?>
<link rel="Stylesheet" type="text/css" href="../Resources/css/login.css" />
<link type="text/javascript" src="../Resources/js/script.js" />
<link href="https://fonts.googleapis.com/css?family=Jomhuria&amp;subset=latin-ext" rel="stylesheet"> <html lang="en">


<body>
    <div class="register-block">
        <h1>zarejestruj</h1>
        <form action="../Controller/controller.php?method=insertUser" method=post>
            <input class="input3" type="text" id="imie" placeholder="Imię" name="imie" class="data" required autofocus />
                <div class="error">   <?php if(isset($_SESSION['e_name']))
                {   echo    $_SESSION['e_name'];
                    unset($_SESSION['e_name']);}?> 
                </div>
            <input class="input3" type="text" id="nazwisko" placeholder="Nazwisko" name="nazwisko" class="data" required autofocus />
                <div class="error">   <?php if(isset($_SESSION['e_name']))
                {   echo    $_SESSION['e_name'];
                    unset($_SESSION['e_name']);}?> 
                </div>
            <input class="input3" type="text" id="miejscowość" placeholder="Miejscowość" name="miejscowość" class="data" required />
                <div class="error">   <?php if(isset($_SESSION['e_name']))
                {   echo    $_SESSION['e_name'];
                    unset($_SESSION['e_name']);}?> 
                </div>
            <input class="input3" type="text" id="login" placeholder="Login" name="login" class="data" required />
                <div class="error">   <?php if(isset($_SESSION['e_login']))
                {   echo    $_SESSION['e_login'];
                    unset($_SESSION['e_login']);}?> 
                </div>
            <input class="input3" type="email" id="email" placeholder="E-mail" name="email" class="data" required />  
            <input class="input3" type="password" id="haslo" placeholder="Hasło" name="haslo" class="data" required />
            <input class="input3" type="password" id="haslo2" placeholder="Powtórz hasło" name="haslo2" class="data" required />
            <div class="error">   <?php if(isset($_SESSION['e_pass']))
                {   echo    $_SESSION['e_pass'];
                    unset($_SESSION['e_pass']);}?> </div>
            <div class="reg3">
            <a href="index.php">Powrót do strony głównej</a>
            <button><b>OK</b></button>
        </div>
        </form>
        <div class="empty"></div>
    </div>
    <?php include_once "footer.php"; ?>
</body>
</html>