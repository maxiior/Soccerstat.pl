<?php
require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo $twig->render('match.twig');

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
    echo 'vueApp.squad=[];';
    echo 'vueApp.statistics=[];';
    echo '</script>';
    for($i=0; $i<11; $i++)
    {
        echo '<script type="text/JavaScript">';
        echo 'vueApp.squad.push({name1: "'.$name1.'", name2: "'.$name2.'"});';
        echo '</script>';
    }
    for($i=1; $i<=4; $i++)
    {
        echo '<script type="text/JavaScript">';
        echo 'vueApp.squad.push({name: "'.$name.'", name2: "'.$proc1.'", name2: "'.$proc2.'", name2: "'.$i.'"});';
        echo '</script>';
    }

    echo '<script type="text/JavaScript">';
    echo 'vueApp.matchData = '.$matchData.'';
    echo 'vueApp.matchLeague = '.$matchLeague.'';
    echo 'vueApp.matchTeam1 = '.$matchTeam1.'';
    echo 'vueApp.matchTeam2 = '.$matchTeam2.'';
    echo 'vueApp.matchTeam1Name = '.$matchTeam1Name.'';
    echo 'vueApp.matchTeam2Name = '.$matchTeam2Name.'';
    echo 'vueApp.arms1src = '.$arms1src.'';
    echo 'vueApp.arms2src = '.$arms2src.'';
    echo '</script>';

    $connection->close();
}
/////////////////////////////////

?>