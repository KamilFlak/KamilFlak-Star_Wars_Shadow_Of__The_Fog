<?php

session_start();

require_once"connect_star_wars.php";

if(!isset($_POST['login'])||(!isset($_POST['haslo'])))
{
    header('Location:index_star_wars.php');
    exit();
}

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error.".$polaczenie->connect_errno;
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");

    if($rezultat = @$polaczenie->query(
        sprintf("SELECT * FROM jedi WHERE user='%s'",
        mysqli_real_escape_string($polaczenie,$login))))
        {
             $ilu_userow = $rezultat->num_rows;
             if($ilu_userow>0)
             {
                $wiersz = $rezultat->fetch_assoc();

                if(password_verify($haslo, $wiersz['pass']))
                {
                 $_SESSION['zalogowany']=true;
                 $_SESSION['id']=$wiersz['id'];
                 $_SESSION['user' ] = $wiersz['user'];
                 $_SESSION['metal' ] = $wiersz['metal'];
                 $_SESSION['krysztal' ] = $wiersz['krysztal'];
                 $_SESSION['coaxium' ] = $wiersz['coaxium'];
                 $_SESSION['email' ] = $wiersz['email'];
                 $_SESSION['dnipremium' ] = $wiersz['dnipremium'];
                 unset($_SESSION['blad']);
                 $rezultat->free_result();
                 header('Location:gra_star_wars.php');
                }
                else
                {
                    $_SESSION['blad']='<span style = "color:red"><br>Nieprawidłowy login lub haslo!</span>';
                    header('Location:index_star_wars.php');
                }
             }
             else
             {
                $_SESSION['blad']='<span style = "color:red"><br>Nieprawidłowy login lub haslo!</span>';
                header('Location:logowanie_star_wars.php');

             }
        }
    $polaczenie->close();
}
?>