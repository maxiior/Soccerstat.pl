<?php
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "pilka";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    for($i=115960; $i<117000; $i++)
    {
        $score1 = rand(0,4);
        $apasses1 = rand(20,100);
        $shoots1 = rand($score1, 5);
        $ashoots1 = rand($score1, $shoots1);
        $yellow1 = rand(0, 1);

        if(rand(0,100)>80) { $red1 = rand(0,1); }
        else { $red1 = 0; }

        $fauls1 = $yellow1 + $red1 + rand(0,8);
        $time = rand(30,90);

        $sql = "UPDATE player_stats SET Bramki={$score1}, Podania_celne={$apasses1}, Strzały={$shoots1}, Strzały_celne={$ashoots1}, Żółte_kartki={$yellow1}, Czerwone_kartki={$red1}, 
        Faule={$fauls1}, Czas_gry={$time} WHERE id = ".$i;

        $result = $connection->query($sql);
    }
?>