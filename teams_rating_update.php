<?php

error_reporting(E_ERROR | E_PARSE);

$connection = @new mysqli('localhost', 'root', '', 'pilka');

for($i=4900; $i<5700; $i++)
{
    $sql = "SELECT club_id, club2_id, score1, score2, possession1, possession2, apasses1, apasses2, shoots1, shoots2, ashoots1, ashoots2, yellow1, yellow2, red1, red2, free1, free2, penalty1, penalty2, corner1, corner2, fauls1, fauls2 FROM games WHERE id=".$i;
    $result = $connection->query($sql);
    $row = mysqli_fetch_array($result);

    if($row[2]>$row[3])
    {
        $win_or_lose = 1;
    }
    else
    {
        $win_or_lose = 0;
    }
    

    $sql2 = 'CALL CALCULATE_TEAM_RATING('.$row[0].', '.$i.', '.$row[4].', '.$row[6].', '.$row[8].', '.$row[10].', '.$row[2].', '.$row[3].', '.$win_or_lose.', '.$row[22].', '.$row[12].', '.$row[14].', '.$row[16].', '.$row[20].', '.$row[18].')';
    $result2 = $connection->query($sql2);
}

for($i=100; $i<200; $i++)
{
    $sql2 = 'CALL CALCULATE_TEAM_SEASON_RATING('.$i.', 1)';
    $result2 = $connection->query($sql2);
}


?>