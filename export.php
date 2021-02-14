<?php

    if(isset($_POST['exportJson']))
    {
        require("db_connection.php");
        $conn = $db->getConnection();
        
        // get Matches
        $query = "SELECT * FROM matches";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        
        $matches = array();
        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $matches[] = $row;
            }
        }
        
        $fp = fopen('matches.json', 'w');
        fwrite($fp, json_encode($matches));
        fclose($fp);
        
        mysqli_close($con);
    }
    else if(isset($_POST['exportCSV']))
    {
        require("db_connection.php");
        $conn = $db->getConnection();

        // get Matches
        $query = "SELECT * FROM matches";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }

        $matches = array();
        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $matches[] = $row;
            }
        }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=Matches.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Date', 'First Team ID', 'Second Team ID', 'First Team Name', 'Second Team Name', 'Score', 'League ID', 'League Name', 'First Team Shots', 'Second Team Shots', 'First Team Possession', 'Second Team Possession', 'First Team Pass', 'Second Team Pass', 'First Team Fauls', 'Second Team Fauls'));

    if (count($matches) > 0) 
    {
        foreach ($matches as $row) 
        {
            fputcsv($output, $row);
        }
    }
    mysqli_close($con);
    }

?>