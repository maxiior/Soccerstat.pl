<?php

session_start();

require_once './vendor/autoload.php';
require_once "connect.php";

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo $twig->render('index.twig');

//SELECT g.date,g.team1, g.team2, g.score1, g.score2,c.country FROM games g INNER JOIN clubs c ON c.id = g.club_id WHERE c.country='Spain'
//SELECT g.date,g.team1, g.team2, g.score1, g.score2,c.country FROM games g INNER JOIN clubs c ON c.id = g.club_id
//TUTAJ
$connection = @new mysqli($host, $db_user, $db_password, $db_name);
$sql = "SELECT g.date, g.team1, g.team2, g.score1, g.score2, g.id, c.country FROM games AS g, clubs AS c WHERE c.id = g.club_id LIMIT 27";
$result = $connection->query($sql);


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
		$row = $result->fetch_array(MYSQLI_BOTH);

		if($row[3] > $row[4]) { $whoWon=1; }
        elseif($row[3] == $row[4]) { $whoWon=0; }
		else { $whoWon=2; }

        if($row[6] == "England") { $league='Premier League'; }
        elseif($row[6] == "Spain") { $league='LaLiga'; }
        elseif($row[6] == "France") { $league='Ligue 1'; }
        elseif($row[6] == "Germany") { $league='Bundesliga'; }
        else { $league='Serie A'; }

        echo '<script type="text/JavaScript">';
        echo 'vueApp.mecze.push({league: "'.$league.'", team1: "'.$row[1].'", team2: "'.$row[2].'", score: "'.$row[3].'-'.$row[4].'", date: "'.$row[0].'", whoWon: '.$whoWon.', idInDB: "'.$row[5].'", id: '.$i.'});';
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