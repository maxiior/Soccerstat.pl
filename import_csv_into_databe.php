<?php
    function import_csv_into_databe($fileName, $size, $host, $db_user, $db_password, $db_name)
    {
        $conn = mysqli_connect($host, $db_user, $db_password, $db_name);

        if ($size > 0) 
        {
            $file = fopen($fileName, "r");
                
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $sql = 'INSERT into games (club_id,club2_id,date,team1,team2,score1,score2,possession1,possession2,apasses1,apasses2,shoots1,shoots2,ashoots1,ashoots2,yellow1,yellow2,red1,red2,free1,free2,penalty1,penalty2,corner1,corner2,fauls1,fauls2,AddDate)
                values ('.$getData[0].','.$getData[1].',"'.$getData[2].'","'.$getData[3].'","'.$getData[4].'",'.$getData[5].','.$getData[6].','.$getData[7].','.$getData[8].','.$getData[9].','.$getData[10].','.$getData[11].','.$getData[12].','.$getData[13].','.$getData[14].','.$getData[15].','.$getData[16].','.$getData[17].','.$getData[18].','.$getData[19].','.$getData[20].','.$getData[21].','.$getData[22].','.$getData[23].','.$getData[24].','.$getData[25].','.$getData[26].', NOW())';
                $conn->query($sql);
            }
        }
        $conn->close();
    }
?>