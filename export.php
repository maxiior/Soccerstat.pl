<?php
	require_once "connect.php";
    session_start();

    if(isset($_POST['flexRadioDefault']) && $_POST['flexRadioDefault']=='json')
    {
        $con = mysqli_connect($host,$db_user,$db_password, $db_name) or die("Error " . mysqli_error($con));
        
        $query = "SELECT * FROM games";
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

        $fp = fopen('Matches.json', 'w');
        fwrite($fp, json_encode($matches));
        fclose($fp);
        
        mysqli_close($con);
        $_SESSION["info"] = 3;
		header('Location: index.php');
		exit();
    }
    else
    {
        $con = mysqli_connect($host,$db_user,$db_password, $db_name) or die("Error " . mysqli_error($con));
        
        $query = "SELECT * FROM games";
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

        //header('Content-Type: text/csv; charset=utf-8');
        //header('Content-Disposition: attachment; filename=Matches.csv');
        $output = fopen('Matches.csv', 'w');
        fputcsv($output, array('Date', 'First Team ID', 'Second Team ID', 'First Team Name', 'Second Team Name', 'Score', 'League ID', 'League Name', 'First Team Shots', 'Second Team Shots', 'First Team Possession', 'Second Team Possession', 'First Team Pass', 'Second Team Pass', 'First Team Fauls', 'Second Team Fauls'));

        if (count($matches) > 0) 
        {
            foreach ($matches as $row) 
            {
                fputcsv($output, $row);
            }
        }
        mysqli_close($con);
        
        $_SESSION["info"] = 3;
		header('Location: index.php');
		exit();
    }

?>