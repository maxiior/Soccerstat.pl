<?php
require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo $twig->render('bestteam.twig');

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
    echo '<script type="text/javascript">';
    echo 'vueApp.info[0].value='.$team.';';
    echo 'vueApp.info[1].value='.$averageGoalsScored.';';
    echo 'vueApp.info[2].value='.$averageGoalsConceded.';';
    echo 'vueApp.info[3].value='.$averagePossession.';';
    echo 'vueApp.info[4].value='.$averageAmountOfShoots.';';
    echo 'vueApp.info[5].value='.$averageAmountOfPasses.';';
    echo 'vueApp.info[6].value='.$averageAmountOfFauls.';';
    echo 'vueApp.info[7].value='.$rating.';';
    echo 'vueApp.armsBest='.$arms.';';
    echo '</script>';
    $connection->close();
}
/////////////////////////////////

?>