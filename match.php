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
    $whichMatch = $_POST['whichMatch'];

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
	
	$sql = "SELECT g.club_id, g.club2_id FROM games as g WHERE g.id=\"$whichMatch\"";
	$result = $connection->query($sql);
	$results = $result->fetch_array(MYSQLI_BOTH);
	
	$sql1 = "SELECT p.name, p.surname FROM players as p WHERE p.club_id= \"$results[0]\"";
    $result1 = $connection->query($sql1);

    $sql2 = "SELECT p.name, p.surname FROM players as p WHERE p.club_id= \"$results[1]\"";
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

		$sql = "SELECT g.date,g.score1,g.score2,g.team1,g.team2, c.country FROM games as g, clubs as c WHERE G.club_id= C.id";
        $result = $connection->query($sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
	
        if($row[5] == "England") { $league='Premier League'; }
        elseif($row[5] == "Spain") { $league='La Liga'; }
        elseif($row[5] == "France") { $league='Ligue 1'; }
        elseif($row[5] == "Germany") { $league='Bundesliga'; }
        else { $league='Serie A'; }

        $path1 = './photos/'.$league.'/'.$row[3].'.jpg';
        $path2 = './photos/'.$league.'/'.$row[4].'.jpg';

		$matchData = $row[0];
		$matchLeague = $league;
		$matchTeam1 = $row[1];
		$matchTeam2 = $row[2];
		$matchTeam1Name = $row[3];
		$matchTeam2Name = $row[4];
		$arms1src = $path1;
		$arms2src = $path2;
		
        echo '<script type="text/JavaScript">';
        echo 'vueApp.matchData = "'.$matchData.'";';
        echo 'vueApp.matchLeague = "'.$matchLeague.'";';
        echo 'vueApp.matchTeam1 = "'.$matchTeam1.'";';
        echo 'vueApp.matchTeam2 = "'.$matchTeam2.'";';
        echo 'vueApp.matchTeam1Name = "'.$matchTeam1Name.'";';
        echo 'vueApp.matchTeam2Name = "'.$matchTeam2Name.'";';
        echo 'vueApp.arms1src = "'.$arms1src.'";';
        echo 'vueApp.arms2src = "'.$arms2src.'";';
        echo '</script>';

        $connection->close();
    }
}
/////////////////////////////////



?>