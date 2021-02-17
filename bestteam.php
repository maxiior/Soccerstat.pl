<?php
require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo $twig->render('bestteam.twig');

//TUTAJ
$connection = @new mysqli("localhost", "root",'' , 'pilka');
$sql = "SELECT MAX(ocena_w_sezonie),ROUND(AVG(Bramki_zdobyte),0),ROUND(AVG(Bramki_stracone),0),ROUND(AVG(Posiadanie_piłki),0), ROUND(AVG(Strzały),0), ROUND(AVG(Podania_celne),0), ROUND(AVG(Faule),0), name 
FROM Ocena_zespołu_w_sezonie INNER JOIN ocena_zespołu_w_meczu ON ocena_zespołu_w_sezonie.druzyna_id = ocena_zespołu_w_meczu.team_id 
INNER JOIN clubs ON ocena_zespołu_w_sezonie.druzyna_id = clubs.id";

$result = $connection->query($sql);
$row = $result->fetch_array(MYSQLI_BOTH);
echo($row[2]);
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
    echo 'vueApp.info[0].value="'.$row[7].'"';
    echo 'vueApp.info[1].value="'.$row[1].'";';
    echo 'vueApp.info[2].value="'.$row[2].'";';
    echo 'vueApp.info[3].value="'.$row[3].'";';
    echo 'vueApp.info[4].value="'.$row[4].'";';
    echo 'vueApp.info[5].value="'.$row[5].'";';
    echo 'vueApp.info[6].value="'.$row[6].'";';
    echo 'vueApp.info[7].value="'.$row[0].'";';
    echo 'vueApp.armsBest='.$arms.';';
    echo '</script>';
    $connection->close();
}
/////////////////////////////////

?>