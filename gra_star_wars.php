<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
    header('Location:index_star_wars.php');
    exit();
}
?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Star Wars: Shadow Of The Fog</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="gra_star_wars.css">
</head>

<body>
    <header id="header" style="display: flex">
        <img src="images_sw/logo_sw_sof.png" id="logo">
    </header>

    <div class="box_log_up" style="display: flex">
        <div class="box_log" style="display: flex">

            <p class="big_text" style="display: flex">
                UDAŁO CI SIĘ ZALOGOWAĆ<br>

            </p>
            <p class="center_text">
                Ponizej znajduję się<br>
                ilość Twoich zasobów na planecie
            </p>
            <br>

            <div class="center_text">
                <?php

echo "<p>Witaj padawanie ".$_SESSION['user'].'!<a class="logout" href="logout_star_wars.php"> Wyloguj sie padawanie</a></p>';
echo "<b> Metal: </b> ".$_SESSION['metal'];
echo " | <b> Kryształ: </b> ".$_SESSION['krysztal'];
echo " | <b> Coaxium: </b> ".$_SESSION['coaxium']."</p>";
echo "<p><b>E-mail: </b>".$_SESSION['email']."</p>";
echo "<p><b>Dni premium: </b>".$_SESSION['dnipremium']."</p>";
?>

            </div>
        </div>
    </div>

    <footer id="footer">
        powered by KFX3D Kamil Flak tel.664-149-842
    </footer>
</body>

</html>