<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$connection = @new mysqli('localhost', 'root', '', 'pilka');

/*for($i=113200; $i<116741; $i++)
{
    $sql = "SELECT player_ID, mecz_ID, Podania_celne, Strzały, Strzały_celne, Bramki, Faule, Żółte_kartki, Czerwone_kartki, Czas_gry FROM player_stats WHERE id=".$i;
    $result = $connection->query($sql);
    $row = mysqli_fetch_array($result);

    $sql2 = 'CALL CALCULATE_PLAYER_RATING('.$row[0].', '.$row[1].', '.$row[2].', '.$row[3].', '.$row[4].', '.$row[5].', '.$row[6].', '.$row[7].', '.$row[8].', '.$row[9].')';
    $result2 = $connection->query($sql2);
}*/

for($i=1; $i<3121; $i++)
{
    $sql2 = 'CALL CALCULATE_PLAYER_SEASON_RATING('.$i.', 1)';
    $result2 = $connection->query($sql2);
}


$_SESSION["info"] = 4;
header('Location: index.php');
exit();

?>