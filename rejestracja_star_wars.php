<?php
session_start();
if(isset($_POST['email']))   // sprawdzenie czy w drodze submita zostaly przeslane poszczegolne pola. Tylko email poniewaz inne tez musza byc ustawione
{
    //udana walidacja? Zalozmy ze tak
    $wszystko_OK=true;
    //Sprawdz poprawnosc nickname
    $nick = $_POST['nick'];
    // sprawdzenie dlugosci nicka
    if((strlen($nick)<3) || (strlen($nick)>20))
    {
        $wszystko_OK=false;
        $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znakow";  //e jak errror
    }

    if(ctype_alnum($nick)==false)
    {
        $wszystko_OK=false;
        $_SESSION['e_nick']="Nick moze składać się tylko z liter i cyfr (bez polskich znakow :) )";
    }

    //sprawdz poprawnosc adresu email
    $email = $_POST['email'];
    $emailB = filter_var($email,FILTER_SANITIZE_EMAIL); //emailB jako ze email bezpieczny
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false)||($emailB!=$email))
    {
        $wszystko_OK=false;
        $_SESSION['e_email']="Podaj poprawny adres email";
    }
    //sprawdz poprawnosc hasla
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];
    if((strlen($haslo1)<8) || (strlen($haslo1)>20))
    {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków";
    }

    if($haslo1!=$haslo2)
    {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Podane hasła nie są identyczne";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
    //echo $haslo_hash; exit();

    //echo $_POST['regulamin']; exit(); TEST

    //czy zaakceptowano regulamin?
    if(!isset($_POST['regulamin']))
    {
        $wszystko_OK=false;
        $_SESSION['e_regulamin']="Nie zaakceptowano regulaminu";
    }

    //RECAPTCHA DZIALA CZY NIE? BOT

    /*$sekret = "6Ldf8voUAAAAAHK5VS6ShJrJ4s-GY4ReCqvkvJMX";
    $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

    $odpowiedz = json_decode($sprawdz);


    if($odpowiedz->success==false)
    {
        $wszystko_OK=false;
        $_SESSION['e_bot']="Potwierdz ze nie jestes botem";
    }
    */
    require_once "connect_star_wars.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try
    {
        $polaczenie = new mysqli($host, $db_user, "$db_password", $db_name); //operator malpy jest nie potrzebny poniewaz wykorzystujemy try catch jest to nowsza wersja
        if($polaczenie->connect_errno!=0)
        {
        throw new Exception(mysqli_connect_errno());
        }
        else
        {
            //czy email juz istnieje
            $rezultat = $polaczenie->query("SELECT id FROM jedi WHERE email='$email'");
            if(!$rezultat)
            throw new Exception($polaczenie->error);

            $ile_takich_maili = $rezultat->num_rows;
            if($ile_takich_maili>0)
            {

                    $wszystko_OK=false;
                    $_SESSION['e_email']="Istnieje juz konto przypisane do tego adresu e-mail";

            }
            //czy nick juz istnieje
            $rezultat = $polaczenie->query("SELECT id FROM jedi WHERE user='$nick'");
            if(!$rezultat) throw new Exception($polaczenie->error);


            $ile_takich_nickow = $rezultat->num_rows;

            if($ile_takich_nickow>0)
            {
                    $wszystko_OK=false;
                    $_SESSION['e_nick']="Istnieje juz gracz o takim nicku spróbuj wybrać inny ";
            }
            if($wszystko_OK==true)
            {
                //hurra, wszystkie testy zaliczone dodajemy gracza do bazy
                //echo "udana walidacja!";
                //exit();
                if($polaczenie->query("INSERT INTO jedi VALUES (NULL, '$nick', '$haslo_hash','$email', 150, 200, 50, 21)"))
                {
                    $_SESSION['udanarejestracja']=true;
                    //echo "udanarejestracja";
                    header('Location: witamy_star_wars.php');
                }
                else
                {
                    throw new Exception($polaczenie->error);
                }
            }
            $polaczenie->close();
        }
    }
    catch(Exception $e)
    {
    echo '<span style = "color:red;">Blad serwera! przepraszamy za niedogodności i prosimy o rejestracje w innym terminie!</span>';
    echo '<br/>Informacja developerska:'.$e;
    }


}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Star Wars: Shadow Of The Fog</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="rejestracja_star_wars.css">

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
                REJESTRACJA
            </p>
            <form method="post">
                <p class="center_text">Wpisz nick </p>
                <input type="text" name="nick"><br><br>
                <?php
        if(isset($_SESSION['e_nick']))
        {
            echo '<div class = "error">'.$_SESSION['e_nick'].'</div>';
            unset($_SESSION['e_nick']);

        }
        ?>
                <br>
                <br>
                <p class="center_text">Podaj e-mail </p>
                <input type="text" name="email"><br><br>
                <?php
        if(isset($_SESSION['e_email']))
        {
            echo '<div class = "error">'.$_SESSION['e_email'].'</div>';
            unset($_SESSION['e_email']);

        }
        ?>
                <br>
                <br>
                <p class="center_text">Twoje hasło </p>
                <input type="password" name="haslo1"><br><br>
                <?php
        if(isset($_SESSION['e_haslo']))
        {
            echo '<div class = "error">'.$_SESSION['e_haslo'].'</div>';
            unset($_SESSION['e_haslo']);

        }
        ?>
                <br>
                <br>
                <p class="center_text">Powtórz Twoje hasło </p>
                <input type="password" name="haslo2"><br><br>
                <label>
                    <input type="checkbox" name="regulamin" />
                    <p class="text">Akceptuje regulamin</p>

                    <form action="?" method="POST">
                        <!-- <div class="g-recaptcha" data-sitekey="6Ldf8voUAAAAAFm1VPQIo9zZvkAOHMwSPN0JU81b"></div> -->
                        <?php
                        if(isset($_SESSION['e_bot']))
                            {
                                 echo '<div class = "error">'.$_SESSION['e_bot'].'</div>';
                                 unset($_SESSION['e_bot']);

                            }
                        ?> -->
                        <?php
                        if(isset($_SESSION['e_regulamin']))
                        {
                                echo '<div class = "error">'.$_SESSION['e_regulamin'].'</div>';
                                unset($_SESSION['e_regulamin']);

                        }
                        ?>
                        <br />
                        <input type="submit" value="Wyślij">

                    </form>

                </label>
            </form>
            <br><br><br>

            <div style="display: flex">
                <p class="center_text">
                    Jeżeli posiadasz konto <a class="rejestracja" href="logowanie_star_wars.php">Zaloguj się</a>
                </p>
            </div>
        </div>

    </div>
    <footer id="footer">
        powered by KFX3D Kamil Flak tel.664-149-842
    </footer>
</body>
</html>