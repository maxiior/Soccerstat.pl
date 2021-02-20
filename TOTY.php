<?php
require_once './vendor/autoload.php';
require_once "connect.php";

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo $twig->render('TOTY.twig');

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
    $sql ="SELECT Players.Player, ocena_zawodnika_w_sezonie.ocena_w_sezonie, Players.Team, Players.League from ocena_zawodnika_w_sezonie, players, toty 
    WHERE toty.zawodnik_ID = Players.id AND Players.id = ocena_zawodnika_w_sezonie.zawodnik_ID AND Players.Position = \"FW\"";
	$result = $connection->query($sql);
    $row = $result->fetch_array(MYSQLI_BOTH);
	
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

	
    $N_name = $name[0];
    $N_lastname = $name[1];
    $N_rate = $row[1];
    $N_arms = $path;
	
	

    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

    $LS_name = $name[0];
    $LS_lastname = $name[1];
    $LS_rate = $row[1];
    $LS_arms = $path;
	

    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

    $PS_name = $name[0];
    $PS_lastname = $name[1];
    $PS_rate = $row[1];
    $PS_arms = $path;
	

    $sql ="SELECT Players.Player, ocena_zawodnika_w_sezonie.ocena_w_sezonie, Players.Team, Players.League from ocena_zawodnika_w_sezonie, players, toty 
    WHERE toty.zawodnik_ID = Players.id AND Players.id = ocena_zawodnika_w_sezonie.zawodnik_ID AND Players.Position = \"MF\"";
	$result = $connection->query($sql);
    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

    $SPO_name = $name[0];
    $SPO_lastname = $name[1];
    $SPO_rate = $row[1];
    $SPO_arms = $path;

    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

    $LP_name = $name[0];
    $LP_lastname = $name[1];
    $LP_rate = $row[1];
    $LP_arms = $path;

    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

    $PP_name = $name[0];
    $PP_lastname = $name[1];
    $PP_rate = $row[1];
    $PP_arms = $path;

    $sql ="SELECT Players.Player, ocena_zawodnika_w_sezonie.ocena_w_sezonie, Players.Team, Players.League from ocena_zawodnika_w_sezonie, players, toty 
    WHERE toty.zawodnik_ID = Players.id AND Players.id = ocena_zawodnika_w_sezonie.zawodnik_ID AND Players.Position = \"DF\"";
	$result = $connection->query($sql);
    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';
	
	
    $LO_name = $name[0];
    $LO_lastname = $name[1];
    $LO_rate = $row[1];
    $LO_arms = $path;

    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

    $PO_name = $name[0];
    $PO_lastname = $name[1];
    $PO_rate = $row[1];
    $PO_arms = $path;

    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

    $LSO_name = $name[0];
    $LSO_lastname = $name[1];
    $LSO_rate = $row[1];
    $LSO_arms = $path;

    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

    $PSO_name = $name[0];
    $PSO_lastname = $name[1];
    $PSO_rate = $row[1];
    $PSO_arms = $path;
	

    $sql ="SELECT Players.Player, ocena_zawodnika_w_sezonie.ocena_w_sezonie, Players.Team, Players.League from ocena_zawodnika_w_sezonie, players, toty 
    WHERE toty.zawodnik_ID = Players.id AND Players.id = ocena_zawodnika_w_sezonie.zawodnik_ID AND Players.Position = \"GK\"";
	$result = $connection->query($sql);
    $row = $result->fetch_array(MYSQLI_BOTH);
    $name = explode(" ", $row[0]);
    $path = './photos/'.$row[3].'/'.str_replace(" ", "_", $row[2]).'.jpg';

    $BR_name = $name[0];
    $BR_lastname = $name[1];
    $BR_rate = $row[1];
    $BR_arms = $path;

	echo($PS_name);
	echo($PS_lastname);
	
    echo '<script type="text/JavaScript">';
    echo 'vueApp.players[0].precise[0].name = "'.$N_name.'";';
    echo 'vueApp.players[0].precise[0].lastname = "'.$N_lastname.'";';
    echo 'vueApp.players[0].precise[0].rate = "'.$N_rate.'";';
    echo 'vueApp.players[0].precise[0].arms = "'.$N_arms.'";';

    echo 'vueApp.players[1].precise[0].name = "'.$LS_name.'";';
    echo 'vueApp.players[1].precise[0].lastname = "'.$LS_lastname.'";';
    echo 'vueApp.players[1].precise[0].rate = "'.$LS_rate.'";';
    echo 'vueApp.players[1].precise[0].arms = "'.$LS_arms.'";';

    echo 'vueApp.players[1].precise[1].name = "'.$PS_name.'";';
    echo 'vueApp.players[1].precise[1].lastname = "'.$PS_lastname.'";';
    echo 'vueApp.players[1].precise[1].rate = "'.$PS_rate.'";';
    echo 'vueApp.players[1].precise[1].arms = "'.$PS_arms.'";';

    echo 'vueApp.players[2].precise[0].name = "'.$SPO_name.'";';
    echo 'vueApp.players[2].precise[0].lastname = "'.$SPO_lastname.'";';
    echo 'vueApp.players[2].precise[0].rate = "'.$SPO_rate.'";';
    echo 'vueApp.players[2].precise[0].arms = "'.$SPO_arms.'";';

    echo 'vueApp.players[3].precise[0].name = "'.$LP_name.'";';
    echo 'vueApp.players[3].precise[0].lastname = "'.$LP_lastname.'";';
    echo 'vueApp.players[3].precise[0].rate = "'.$LP_rate.'";';
    echo 'vueApp.players[3].precise[0].arms = "'.$LP_arms.'";';

    echo 'vueApp.players[3].precise[1].name = "'.$PP_name.'";';
    echo 'vueApp.players[3].precise[1].lastname = "'.$PP_lastname.'";';
    echo 'vueApp.players[3].precise[1].rate = "'.$PP_rate.'";';
    echo 'vueApp.players[3].precise[1].arms = "'.$PP_arms.'";';

    echo 'vueApp.players[4].precise[0].name = "'.$LO_name.'";';
    echo 'vueApp.players[4].precise[0].lastname = "'.$LO_lastname.'";';
    echo 'vueApp.players[4].precise[0].rate = "'.$LO_rate.'";';
    echo 'vueApp.players[4].precise[0].arms = "'.$LO_arms.'";';

    echo 'vueApp.players[4].precise[1].name = "'.$PO_name.'";';
    echo 'vueApp.players[4].precise[1].lastname = "'.$PO_lastname.'";';
    echo 'vueApp.players[4].precise[1].rate = "'.$PO_rate.'";';
    echo 'vueApp.players[4].precise[1].arms = "'.$PO_arms.'";';

    echo 'vueApp.players[5].precise[0].name = "'.$LSO_name.'";';
    echo 'vueApp.players[5].precise[0].lastname = "'.$LSO_lastname.'";';
    echo 'vueApp.players[5].precise[0].rate = "'.$LSO_rate.'";';
    echo 'vueApp.players[5].precise[0].arms = "'.$LSO_arms.'";';

    echo 'vueApp.players[5].precise[1].name = "'.$PSO_name.'";';
    echo 'vueApp.players[5].precise[1].lastname = "'.$PSO_lastname.'";';
    echo 'vueApp.players[5].precise[1].rate = "'.$PSO_rate.'";';
    echo 'vueApp.players[5].precise[1].arms = "'.$PSO_arms.'";';

    echo 'vueApp.players[6].precise[0].name = "'.$BR_name.'";';
    echo 'vueApp.players[6].precise[0].lastname = "'.$BR_lastname.'";';
    echo 'vueApp.players[6].precise[0].rate = "'.$BR_rate.'";';
    echo 'vueApp.players[6].precise[0].arms = "'.$BR_arms.'";';
    echo '</script>';

    $connection->close();
}
/////////////////////////////////

?>