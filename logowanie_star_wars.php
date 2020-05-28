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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Star Wars: Shadow Of The Fog</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="logowanie_star_wars.css">

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

    <section class="image1"></section>

    <div class="box_log_up" style="display: flex">

        <div class="box_log" style="display: flex">
            <p class="big_text" style="display: flex">
                ZALOGUJ SIĘ<br>
                W NIEZWYKŁYM ŚWIECIE<br>
                GWIEZDNYCH WOJEN
            </p>
            <form action="zaloguj_star_wars.php" method="post">

                <p class="center_text">Podaj login padawanie </p>

                <input type="text" name="login"></br>

                <br>
                <br>
                <p class="center_text">Podaj haslo padawanie </p>

                <input type="password" name="haslo" size="15"></br></br>
                <input type="submit" value="Zaloguj sie" />
            </form>
            <br><br><br>

            <div style="display: flex">
                <p class="center_text">
                    Jeżeli nie posiadasz konta <a class="rejestracja" href="rejestracja_star_wars.php">Zarejestruj
                        się</a>
                </p>
            </div>
        </div>
    </div>

    <footer id="footer">
        powered by KFX3D Kamil Flak tel.664-149-842
    </footer>
</body>

</html>