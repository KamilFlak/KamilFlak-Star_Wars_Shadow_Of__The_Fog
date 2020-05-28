<?php
session_start();

if(!isset($_SESSION['udanarejestracja']))
{
    header('Location:index_star_wars.php');
    exit();
}
else
{
    unset($_SESSION['udanarejestracja']);
}
?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Star Wars - gra przeglądarkowa
    </title>
</head>

<body>
    <div>
        <p>
            Dziękujemy za rejestracje w serwisie. Mozesz przejść do gry udanych podbojów kosmosu </br></br>
        </p>
    </div>
    <div>
        <a href="logowanie_star_wars.php">Zaloguj sie na swoje konto padawanie !</a>
    </div>
</body>

</html>