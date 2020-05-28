<?php
session_start();

if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
    header('Location:gra_star_wars.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Star Wars: Shadow Of The Fog</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index_star_wars.css">

</head>

<body>
    <header id="header">
        <nav>
            <a href="index_star_wars.php">Strona Główna</a>
            <a href="logowanie_star_wars.php">Zaloguj</a>
            <a href="rejestracja_star_wars.php">Rejestracja</a>
            <a href="#">Pomoc techniczna</a>
        </nav>

        <img src="images_sw/logo_sw_sof.png" id="logo">
    </header>

    <section class="image1" ></section>

    <div>
        <p class="big_text">
            WITAMY<br>
            W NIEZWYKŁYM ŚWIECIE<br>
            GWIEZDNYCH WOJEN
        </p>
        <p class="center_text">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br>
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>


    </div>
    <footer id="footer">
        powered by KFX3D Kamil Flak tel.664-149-842
    </footer>


</body>

</html>
