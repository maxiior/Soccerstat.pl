<?php

session_start();

require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo $twig->render('index.twig');

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
    echo 'vueApp.infoVal="The file was entered successfully.";';
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

?>