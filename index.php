<?php

session_start();

require_once './vendor/autoload.php';
require_once "connect.php";

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo $twig->render('index.twig');



//TUTAJ
$connection = @new mysqli($host, $db_user, $db_password, $db_name);

if($connection->connect_errno!=0)
{
    echo '<script type="text/JavaScript">';
    echo 'vueApp.showInfo=true;';
    echo 'vueApp.infoVal="Database connection error.";';
    echo '</script>';
}
else
{
    echo '<script type="text/JavaScript">';
    echo 'vueApp.mecze=[];';
    echo '</script>';
    for($i=1; $i<=27; $i++)
    {
        echo '<script type="text/JavaScript">';
        echo 'vueApp.mecze.push({league: "'.$league.'", team1: "'.$team1.'", team2: "'.$team2.'", score: "'.$score.'", date: "'.$date.'", whoWon: '.$who.', idInDB: '.$idInDB.', id: '.$i.'});';
        echo '</script>';
    }
    $connection->close();
}
/////////////////////////////////



if(isset($_SESSION["info"]) && $_SESSION["info"] == -1)
{
    echo '<script type="text/JavaScript">';
    echo 'vueApp.showInfo=true;';
    echo 'vueApp.infoVal="Something went wrong. Try again.";';
    echo '</script>';
    unset($_SESSION["info"]);
}
else if(isset($_SESSION["info"]) && $_SESSION["info"] == 0)
{
    echo '<script type="text/JavaScript">';
    echo 'vueApp.showInfo=true;';
    echo 'vueApp.infoVal="The data was entered successfully.";';
    echo '</script>';
    unset($_SESSION["info"]);
}
else if(isset($_SESSION["info"]) && $_SESSION["info"] == 1)
{
    echo '<script type="text/JavaScript">';
    echo 'vueApp.showInfo=true;';
    echo 'vueApp.infoVal="Database connection error.";';
    echo '</script>';
    unset($_SESSION["info"]);
}
else if(isset($_SESSION["info"]) && $_SESSION["info"] == 2)
{
    echo '<script type="text/JavaScript">';
    echo 'vueApp.showInfo=true;';
    echo 'vueApp.infoVal="The file was entered successfully.";';
    echo '</script>';
    unset($_SESSION["info"]);
}

?>