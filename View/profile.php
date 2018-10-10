<?php include_once '../Config/database.php' ;?>
<?php include_once '../Model/User.php' ;?>
<?php include_once '../Model/Subject.php' ;?>

<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<link rel="Stylesheet" type="text/css" href="../Resources/css/index.css" />
<link href="https://fonts.googleapis.com/css?family=Jomhuria&amp;subset=latin-ext" rel="stylesheet"> <html lang="en">
<link href="https://fonts.googleapis.com/css?family=Swanky+and+Moo+Moo" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Bree+Serif&amp;subset=latin-ext" rel="stylesheet"> 
<link rel="Stylesheet" type="text/css" href="../Resources/css/fontello/css/fontello.css" />
<title>Profil użytkownika</title>
<?php include_once 'header.php'; ?>
<html lang="en">
<body>

    <div class="container">
        <div class="header"> 
            <div class="logo">
                <a class="one" href ="index.php">
                    <img src="../Resources/image/logo.png"/> 
                    <span style="color: #0a663eaf"> korepetycje</span>.pl
                    <div style="clear:both;"></div>
                </a> 
            </div>
             <div class="nav">
                <a href="../View/index-login.php">wróć</a>
                <div class="nav2"><a href="../Controller/logController.php?method=logout">wyloguj</a></div>
            </div>
        </div>

        <div class="content">
            <div class="left2">
                Imie: <?php echo $_SESSION['name']?><p></p>
                Nazwisko:  <?php echo $_SESSION['surname']?></p></p>
                E-mail: <?php echo $_SESSION['email']?> </p></p>
                Ostatnio zalogowana: <?php echo $_SESSION['date']?>
                    <div class="reg">
                        <a class="two" href="register.php"></a>
                        <a href="advert.php"><button>dodaj ogłoszenie</button></a>
                    </div>
            </div>
             
            <div class="right2">
                <h1>TWOJE OSTATNIO DODANE OGŁOSZENIA</h1> 
            <?php

                $database = new Database();
                $db = $database->connect();

                if($query= $database->query("SELECT u.name, u.surname, u.email, a.city, s.ad, s.subject, s.level, s.id_subject FROM user u, address a,subject s 
                WHERE u.id_user = s.user_id_user AND a.id_address = u.address_id_address AND u.login ='".$_SESSION['login']."'
                ORDER BY s.id_subject DESC LIMIT 0,2"))
                {
                    $how_many = $query->num_rows;
                    if($how_many>0)
                    {  
                        for ($i=0;$i<$how_many;$i++)
                        {
                            while($row = mysqli_fetch_array($query))
                            {
                                echo 'Przedmiot: '.stripslashes($row['subject']).'<br />';
                                echo 'Poziom: '.stripslashes($row['level']).'</p>'; 
                            }
                        }$query->free_result();
                    }
                }
            ?>
    
            </div>
        </div>
   
        <div class="socials">
            <div class="socialsdivs">
                <div class="fb"><i class="icon-facebook"></i></div>
                <div class="yt"><i class="icon-youtube"></i></div>
                <div class="tw"><i class="icon-twitter"></i></div>
                <div class="gplus"><i class="icon-gplus"></i></div>
                <div style="clear:both"></div></div>
            </div>
        </div>
 
</tbody>
<?php include_once 'footer.php'; ?>
</div>
<script src="../Resources/js/jquery-3.3.1.min.js"></script>

<script>

	$(document).ready(function() {
	var NavY = $('.header').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('.header').addClass('sticky');
	} else {
		$('.header').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
</script>
</body>
</html>



