<?php
require_once './vendor/autoload.php';
require_once 'connect.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo $twig->render('match.twig');

//TUTAJ

if(isset($_POST['whichMatch']))
{
    $whichMatch = isset($_POST['whichMatch']);

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    $sql1 = "SELECT p.name, p.surname FROM players as p WHERE p.club_id=122";
    $result1 = $connection->query($sql1);

    $sql2 = "SELECT p.name, p.surname FROM players as p WHERE p.club_id=125";
    $result2 = $connection->query($sql2);

    //SELECT possession1,possession2,shoots1,shoots2,apasses1,apasses2,fauls1,fauls2 FROM games WHERE club_id=122
    $sql3 = "SELECT possession1,possession2 FROM games WHERE club_id=122";
    $result3 = $connection->query($sql3);
    $stats = $result3->fetch_array(MYSQLI_BOTH);

    $stat_name = array("Possession", "Shoots", "Passes", "Fauls");


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
            $team1 = $result1->fetch_array(MYSQLI_BOTH);
            $team2 = $result2->fetch_array(MYSQLI_BOTH);
            echo '<script type="text/JavaScript">';
            echo 'vueApp.squad.push({name1: "'.$team1[0].' '.$team1[1].'", name2:"'.$team2[0].' '.$team2[1].'"});';
            echo '</script>';
        }
        for($i=1; $i<=4; $i++)
        {
            echo '<script type="text/JavaScript">';
            echo 'vueApp.statistics.push({name: "'.$stat_name[$i-1].'", proc1: "'.$stats[0].'", proc2: "'.$stats[1].'", id: "'.$i.'"});';
            echo '</script>';
        }

        echo '<script type="text/JavaScript">';
        echo 'vueApp.matchData = "'.$matchData.'"';
        echo 'vueApp.matchLeague = "'.$matchLeague.'"';
        echo 'vueApp.matchTeam1 = "'.$matchTeam1.'"';
        echo 'vueApp.matchTeam2 = "'.$matchTeam2.'"';
        echo 'vueApp.matchTeam1Name = "'.$matchTeam1Name.'"';
        echo 'vueApp.matchTeam2Name = "'.$matchTeam2Name.'"';
        echo 'vueApp.arms1src = "'.$arms1src.'"';
        echo 'vueApp.arms2src = "'.$arms2src.'"';
        echo '</script>';

        $connection->close();
    }
}
/////////////////////////////////



?>