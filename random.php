<?php
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "pilka";


    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    for($i=4900; $i<7200; $i++)
    {
        $score1 = rand(0,8);
        $score2 = rand(0,8);
        $possesion1 = rand(20,80);
        $possesion2 = 100 - $possesion1;
        
        $apasses1 = rand(300,1000);
        $apasses2 = rand(300,1000);
        $shoots1 = rand($score1, 20);
        $shoots2 = rand($score2, 20);
        $ashoots1 = rand($score1, $shoots1);
        $ashoots2 = rand($score2, $shoots2);
        $yellow1 = rand(0, 8);
        $yellow2 = rand(0, 8);

        if(rand(0,100)>80) { $red1 = rand(0,2); }
        else { $red1 = 0; }

        if(rand(0,100)>80) { $red2 = rand(0,2); }
        else { $red2 = 0; }

        $free1 = rand(0,20);
        $free2 = rand(0,20);

        if(rand(0,100)>80) { $penalty1 = rand(0,2); }
        else { $penalty1 = 0; }

        if(rand(0,100)>80) { $penalty2 = rand(0,2); }
        else { $penalty2 = 0; }

        $corner1 = rand(0,8);
        $corner2 = rand(0,8);
        $fauls1 = $free1 + $penalty1 + rand(0,8);
        $fauls2 = $free2 + $penalty2 + rand(0,8);

        $sql = "UPDATE games SET score1={$score1}, score2={$score2}, possession1={$possesion1}, possession2={$possesion2}, apasses1={$apasses1}, apasses2={$apasses2}, 
        shoots1={$shoots1}, shoots2={$shoots2}, ashoots1={$ashoots1}, ashoots2={$ashoots2}, yellow1={$yellow1}, yellow2={$yellow2}, red1={$red1}, red2={$red2}, 
        free1={$free1}, free2={$free2}, penalty1={$penalty1}, penalty2={$penalty2}, corner1={$corner1}, corner2={$corner2}, fauls1={$fauls1}, fauls2={$fauls2} WHERE id = ".$i;

        $result = $connection->query($sql);
    }
?>