<?php include_once '../Config/database.php' ;?>

<?php session_start(); ?>

<!doctype html>
<html>
<link rel="Stylesheet" type="text/css" href="../Resources/css/index.css" />
<link href="https://fonts.googleapis.com/css?family=Jomhuria&amp;subset=latin-ext" rel="stylesheet"> <html lang="en">
<link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto+Slab&amp;subset=latin-ext" rel="stylesheet">
<link rel="Stylesheet" type="text/css" href="../Resources/css/fontello/css/fontello.css" />
<title>Wyniki wyszukiwania</title>
<?php include_once 'header.php'; ?>
 
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
                <a href="login.php">zaloguj</a>
                <div class="nav2"><a href="register.php">zarejestruj</a></div>
            </div>  
        </div>

        <div class="content">
            <div class="main">
                <h1>zad.1. Ile znaleziono ogłoszeń?</h1>

                <?php 

                    $przedmiot = $_POST["przedmiot"];
                    $poziom = $_POST["poziom"];
                    $miejsce = $_POST["miejsce"];

                    $database = new Database();
                    $database->connect();

                    if($query= $database->query("SELECT u.name, u.surname, u.email, a.city, s.ad, s.subject, s.pay FROM user u, address a,subject s 
                        WHERE s.subject='$przedmiot' AND s.level='$poziom' AND s.place_of_lesson='$miejsce' AND u.id_user = s.user_id_user AND a.id_address = u.address_id_address"))
                        {
                            $how_many = $query->num_rows;
                            if($how_many>0)
                            {  
                                ?> Odpowiedź:  <?php echo $how_many.'<br/></br>';
                                for ($i=0;$i<$how_many;$i++)
                                {
                                    while($row = mysqli_fetch_array($query))
                                    {
                                        ?> Korepetytor: <?php echo stripcslashes($row['name']);
                                        echo ' '.stripslashes($row['surname']).'<br />';
                                        echo 'Email: '.stripslashes($row['email']).'<br />';
                                        echo 'Miasto: '.stripcslashes($row['city']).'<br/>';
                                        echo 'Przedmiot: '.stripslashes($przed = $row['subject']).'<br />';
                                        echo 'Opis: '.stripslashes($row['ad']).'<br />'; 
                                        echo 'Stawka: '.stripcslashes($row['pay']).' na godzinę. </p></p>';
                                        
                                    }
                                }
                                $query->free_result();
                            }
                            else
                                echo "Brak ofert!";
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
                <div style="clear:both"></div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>

    <script src="../Resources/js/jquery-3.3.1.min.js"></script>

    <script>
        $(document).ready(function() 
        {
            var NavY = $('.header').offset().top;
            var stickyNav = function()
            {
                var ScrollY = $(window).scrollTop();
                if (ScrollY > NavY)
                { 
                    $('.header').addClass('sticky');
                }   
                else 
                {
                    $('.header').removeClass('sticky'); 
                }
            };
	        stickyNav();
	 
	        $(window).scroll(function() 
            {
		        stickyNav();
	        });
	    });	
    </script>
</body>
</html>