<?php
require_once './vendor/autoload.php';
require_once 'connect.php';

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
    //średnie obliczane są na podstawie mniej więcej połowy meczów, bez $sql3

	$sql ="select ocena_w_sezonie, druzyna_ID from ocena_zespołu_w_sezonie order by ocena_w_sezonie DESC LIMIT 1";
	
	$result = $connection->query($sql);
    $row = $result->fetch_array(MYSQLI_BOTH);

    $sql2 = "SELECT ROUND(AVG(score1),0), ROUND(AVG(score2),0), ROUND(AVG(possession1),0), ROUND(AVG(shoots1),0), ROUND(AVG(apasses1),0), ROUND(AVG(fauls1),0), team1, club_id
    FROM games WHERE club_id= \"$row[1]\"";

    $sql3 = "SELECT ROUND(AVG(score2),0), ROUND(AVG(score1),0), ROUND(AVG(possession2),0), ROUND(AVG(shoots2),0), ROUND(AVG(apasses2),0), ROUND(AVG(fauls2),0)
    FROM games WHERE club2_id= \"$row[1]\"";

    if($result2 = $connection->query($sql2))
    {
        $result3 = $connection->query($sql3);

        $row2 = $result2->fetch_array(MYSQLI_BOTH);
        $row3 = $result3->fetch_array(MYSQLI_BOTH);
		
        $sql4 = "SELECT c.country FROM clubs AS c WHERE c.id = ".$row2[7];

        $result4 = $connection->query($sql4);
        $row4 = $result4->fetch_array(MYSQLI_BOTH);

        if($row4[0] == "England") { $league='Premier League'; }
        elseif($row4[0] == "Spain") { $league='La Liga'; }
        elseif($row4[0] == "France") { $league='Ligue 1'; }
        elseif($row4[0] == "Germany") { $league='Bundesliga'; }
        else { $league='Serie A'; }

        $path = './photos/'.$league.'/'.str_replace(" ", "_", $row2[6]).'.jpg'; 

        echo '<script type="text/javascript">';
        echo 'vueApp.info[0].value="'.$row2[5].'";';
        echo 'vueApp.info[1].value="'.$row2[0].'";';
        echo 'vueApp.info[2].value="'.$row2[1].'";';
        echo 'vueApp.info[3].value="'.$row2[2].'%";';
        echo 'vueApp.info[4].value="'.$row2[3].'";';
        echo 'vueApp.info[5].value="'.$row2[4].'";';
        echo 'vueApp.info[6].value="'.$row2[5].'";';
        echo 'vueApp.info[7].value="'.$row[0].'";';
        echo 'vueApp.armsBest="'.$path.'";';
        echo '</script>';
    }
    else
    {
        echo '<script type="text/JavaScript">';
        echo 'vueApp.showInfo=true;';
        echo 'vueApp.infoVal="Data error.";';
        echo '</script>';
    }
    
    $connection->close();
}
/////////////////////////////////

?>