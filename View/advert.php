<?php include_once '../Config/database.php' ;?>

<?php session_start(); ?>

<!DOCTYPE html>
<html lang ="en">
<title> Dodaj ogłoszenie </title>
<link rel="Stylesheet" type="text/css" href="../Resources/css/login.css" />
<link href="https://fonts.googleapis.com/css?family=Josefin+Slab|Libre+Baskerville" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Jomhuria&amp;subset=latin-ext" rel="stylesheet"> <html lang="en">

<?php include_once "header.php";?>
    
<body>
  <div class="container">
    <form action="../Controller/subjectController.php?method=insertAd" method=post>
    <div class="advert-block2">
      <h1>dodaj ogloszenie</h1>
      <div class="block2">
      Przedmiot:  <select name="Przedmiot">
      <option text="Język polski"> Język polski </option>
      <option text="Język angielski"> Język angielski </option>
      <option text="Język francuski"> Język francuski </option>
      <option text="Język hiszpański"> Język hiszpanski </option>
      <option text="Język rosyjski"> Język rosyjski </option>
      <option text="Matematyka"> Matematyka </option>
      <option text"Fizyka"> Fizyka </option>
      <option text="Chemia"> Chemia </option>
      <option text="Biologia"> Biologia </option>
      <option text="Geografia"> Geografia  </option>
      <option text="Historia"> Historia </option>
      <option text="Wiedza o społeczeństwie"> Wiedza o społeczństwie </option>
      <option text="Wiedza o kulturze"> Wiedza o kulturze </option>
      <option text="Informatyka"> Informatyka </option>
      </select>
      <br></br>
      Poziom:  <select name="Poziom">
      <option text="Szkoła podstawowa"> Szkoła podstawowa </option>
      <option text="Gimnazjum"> Gimnazjum </option>
      <option text="Liceum"> Liceum </option>
      </select>
      <br></br>
      Miejsce korepetycji: <select name="Miejsce">
      <option text="U ucznia"> U ucznia </option>
      <option text="U korepetytora"> U korepetytora </option>
      </select>
      <br></br>
      Opis: <textarea type="text" name="Opis" class="data" required /></textarea>
      Stawka za godzinę: <div class="input2"><input class="input2" type="text" name="Wynagrodzenie" style="width=300px;" class="data" required /></div>
      </div>
  <div class="error">   
  <?php 
    if(isset($_SESSION['e_pay'])) {  
      echo $_SESSION['e_pay'];
      unset($_SESSION['e_pay']);
    }
   ?> 
  </div>
  <div class="reg">
    <a href="index.php">Powrót do strony głównej</a>
    <button><b>OK</b></button>
  </div>
</div>
</form>

<?php include_once "footer.php"; ?>

</div>
</body>
</html>
