<!doctype html>
<html>
<link href="https://fonts.googleapis.com/css?family=Jomhuria&amp;subset=latin-ext" rel="stylesheet"> <html lang="en">
<link rel="Stylesheet" type="text/css" href="../Resources/css/login.css" />
<title>Wyszukiwanie korepetycji</title>
<?php include_once 'header.php'; ?>

<body>
    <div id="container">
        <div class="login-block">
            <h1>wyszukaj</h1>
                <div class="block">
                    <form action="result.php" method=post>
                    Przedmiot:  <select name="przedmiot">
                        <option> Język polski </option>
                        <option> Język angielski </option>
                        <option> Język francuski </option>
                        <option> Język hiszpanski </option>
                        <option> Język rosyjski </option>
                        <option> Matematyka </option>
                        <option> Fizyka </option>
                        <option> Chemia </option>
                        <option> Biologia </option>
                        <option> Geografia  </option>
                        <option> Historia </option>
                        <option> Wiedza o społeczństwie </option>
                        <option> Wiedza o kulturze </option>
                        <option> Informatyka </option>
                    </select>
                    <br></br>
                    Poziom:  <select name="poziom">
                        <option> Szkoła podstawowa </option>
                        <option> Gimnazjum </option>
                        <option> Liceum </option>
                    </select>
                    <br></br>
                    Miejsce korepetycji: <select name="miejsce">
                        <option> U ucznia </option>
                        <option> U korepetytora </option>
                    </select>
                    <div class="reg2">
                        <a href="index.php">Powrót do strony głównej</a>
                        <button><b>OK</b></button>
                    </div>
                    </form>
                </div>
        </div>
        <div class="empty"></div>
    </div>
    <?php include_once "footer.php"; ?>
</body>
</html>