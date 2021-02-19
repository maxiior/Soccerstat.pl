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
	$sql3 ="select oc.ocena_w_sezonie, oc.druzyna_ID 
	from ocena_zespołu_w_sezonie oc 
	where ocena_w_sezonie = (select max(ocena_w_sezonie) from ocena_zespołu_w_sezonie st where oc.druzyna_ID=st.druzyna_ID)";
	
	$result3 = $connection->query($sql3);
    $row3 = $result3->fetch_array(MYSQLI_BOTH);
	
    $sql = "SELECT ocena_w_sezonie,ROUND(AVG(Bramki_zdobyte),0),ROUND(AVG(Bramki_stracone),0),ROUND(AVG(Posiadanie_piłki),0), 
	ROUND(AVG(Strzały),0), ROUND(AVG(Podania_celne),0), ROUND(AVG(Faule),0), name, druzyna_ID 
	FROM Ocena_zespołu_w_sezonie INNER JOIN ocena_zespołu_w_meczu ON ocena_zespołu_w_sezonie.druzyna_id = ocena_zespołu_w_meczu.team_id 
	INNER JOIN clubs ON ocena_zespołu_w_sezonie.druzyna_id = clubs.id WHERE druzyna_ID= \"$row3[1]\"";

    if($result = $connection->query($sql))
    {
        $row = $result->fetch_array(MYSQLI_BOTH);
		
        $sql2 = "SELECT c.country FROM clubs AS c WHERE c.id = ".$row[8];

        $result2 = $connection->query($sql2);
        $row2 = $result2->fetch_array(MYSQLI_BOTH);

        if($row2[0] == "England") { $league='Premier League'; }
        elseif($row2[0] == "Spain") { $league='La Liga'; }
        elseif($row2[0] == "France") { $league='Ligue 1'; }
        elseif($row2[0] == "Germany") { $league='Bundesliga'; }
        else { $league='Serie A'; }

        $path = './photos/'.$league.'/'.str_replace(" ", "_", $row[7]).'.jpg'; 

        echo '<script type="text/javascript">';
        echo 'vueApp.info[0].value="'.$row[7].'";';
        echo 'vueApp.info[1].value="'.$row[1].'";';
        echo 'vueApp.info[2].value="'.$row[2].'";';
        echo 'vueApp.info[3].value="'.$row[3].'";';
        echo 'vueApp.info[4].value="'.$row[4].'";';
        echo 'vueApp.info[5].value="'.$row[5].'";';
        echo 'vueApp.info[6].value="'.$row[6].'";';
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