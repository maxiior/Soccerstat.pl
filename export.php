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
        fputcsv($output, array('ID', 'Club_ID', 'Club2_ID', 'Date', 'Team1', 'Team2', 'Score1', 'Score2', 'Possession1', 'Possession2', 'Apasses1', 'Apasses2', 'Shoots1', 'Shoots2', 'Ashoots1', 'Ashoots2','yellow1','yellow2','red1','red2','free1','free2','penalty1','penalty2','corner1','corner2','fauls1','fauls2'));

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